<?php

return [
    'service_manager' => [
        'factories' => [
            Metis\Metis::class => Metis\Factory::class,
            'hermes.metis' => Metis\HermesFactory::class,
            \Hermes\Api\Client::class => Metis\HermesFactory::class,
        ],
        'aliases' => [
            'hermes' => 'hermes.metis',
        ]
    ],
    'metis' => [
        'services' => [],
        'strategy' => 'random',
        'storage' => [
            'adapter' => [
                'name' => 'filesystem',
                'options' => [
                    'cache_dir' => 'data/cache',
                    //'namespace' => 'test'
                ],
            ],
            'plugins' => [
                // Don't throw exceptions on cache errors
                'exception_handler' => [
                    'throw_exceptions' => false
                ],
            ],
        ],
    ],
];
