<?php

return [
    'limit' => env('feeds_limit', 3),
    'providers' => [
        [
            'url' => 'https://learninglaravel.net/blog',
            'selector' => '.post > h2 > a',
        ],
        [
            'url' => 'https://dev.to/t/laravel',
            'selector' => '.crayons-story__title > a'
        ],

    ],

];
