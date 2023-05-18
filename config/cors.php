<?php

return [

    'default' => 'open',
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'profiles' => [

        'open' => [
            'allowedMethods' => ['*'],
            'allowedOrigins' => ['*'],
            'allowedOriginsPatterns' => [],
            'allowedHeaders' => ['*'],
            'exposedHeaders' => [],
            'maxAge' => 0,
            'supportsCredentials' => false,
        ],

        'disabled' => [
            'allowedMethods' => [],
            'allowedOrigins' => [],
            'allowedOriginsPatterns' => [],
            'allowedHeaders' => [],
            'exposedHeaders' => [],
            'maxAge' => 0,
            'supportsCredentials' => false,
        ],

    ],

];