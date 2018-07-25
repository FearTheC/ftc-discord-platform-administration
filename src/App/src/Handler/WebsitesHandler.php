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

class WebsitesHandler implements RequestHandlerInterface
{
    
    /**
     * @var GuildRepository
     */
    private $guildRepository;

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    public function __construct(
        GuildRepository $guildRepository,
        Template\TemplateRendererInterface $template = null
    ) {
        $this->template = $template;
        $this->guildRepository = $guildRepository;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $data = ['guilds' => $this->guildRepository->getAll()];
        return new HtmlResponse($this->template->render('app::websites', $data));
    }
}
