<?php declare(strict_types=1);

return [
    'dependencies' => [
        'aliases' => [
        ],
        'invokables' => [
        ],
        'factories'  => [
            App\Handler\WebsitesHandler::class => App\Container\Handler\WebsitesHandlerFactory::class,
            FTC\Discord\Model\Aggregate\GuildRepository::class =>
                FTC\Discord\Db\Postgresql\Container\GuildRepository::class,
            
            'database' => FTC\Database\ClientFactory::class,
            'discord_oauth' => App\Container\OAuthFactory::class,
        ],
    ],
];
