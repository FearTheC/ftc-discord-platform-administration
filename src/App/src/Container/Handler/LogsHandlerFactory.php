<?php

declare(strict_types=1);

namespace App\Container\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use App\Handler\LogsHandler;
use FTC\Discord\Model\Aggregate\ErrorMessageRepository;

class LogsHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        $errorMessageRepository  = $container->get(ErrorMessageRepository::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

            return new LogsHandler($errorMessageRepository, $template);
    }
}
