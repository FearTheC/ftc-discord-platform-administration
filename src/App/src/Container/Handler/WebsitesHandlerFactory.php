<?php

declare(strict_types=1);

namespace App\Container\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use FTC\Discord\Model\Aggregate\GuildRepository;
use App\Handler\WebsitesHandler;

class WebsitesHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        $guildRepository  = $container->get(GuildRepository::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

            return new WebsitesHandler($guildRepository, $template);
    }
}
