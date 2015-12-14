<?php

return [
    'service_manager' => [
        'factories' => [
            Metis\Metis::class => Metis\Factory::class,
        ],
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
