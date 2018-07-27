<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;
use Zend\Expressive\Template\TemplateRendererInterface;
use FTC\Discord\Model\Aggregate\GuildRepository;
use FTC\Discord\Model\Aggregate\ErrorMessageRepository;

class LogsHandler implements RequestHandlerInterface
{
    
    /**
     * @var ErrorMessageRepository
     */
    private $errorMessageRepository;

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    public function __construct(
        ErrorMessageRepository $errorMessageRepository,
        Template\TemplateRendererInterface $template = null
    ) {
        $this->template = $template;
        $this->errorMessageRepository= $errorMessageRepository;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $data = ['errors' => $this->errorMessageRepository->getAll()];
        return new HtmlResponse($this->template->render('app::logs', $data));
    }
}
