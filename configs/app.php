<?php

$config['app'] = [
    'service' => [
        HtmlHelper::class
    ],
    'routeMiddleware' => [

    ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ],
    'boot' => [
        AppServiceProvider::class,
    ]
];
