<?php declare(strict_types=1);

return [
    'dependencies' => [
        'aliases' => [
        ],
        'invokables' => [
        ],
        'factories'  => [
            App\Handler\HomePageHandler::class => App\Container\Handler\HomePageHandlerFactory::class,
            App\Handler\WebsitesHandler::class => App\Container\Handler\WebsitesHandlerFactory::class,
            App\Handler\LogsHandler::class => App\Container\Handler\LogsHandlerFactory::class,
            FTC\Discord\Model\Aggregate\GuildRepository::class =>
                FTC\Discord\Db\Postgresql\Container\GuildRepository::class,
            FTC\Discord\Model\Aggregate\ErrorMessageRepository::class =>
                FTC\Discord\Db\Postgresql\Container\ErrorMessageRepository::class,
            
            'database' => FTC\Database\ClientFactory::class,
            'discord_oauth' => App\Container\OAuthFactory::class,
        ],
    ],
];
