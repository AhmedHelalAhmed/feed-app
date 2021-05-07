<?php

return [
    'limit' => env('FEEDS_LIMIT', 3),
    'providers' => [
        [
            'url' => 'https://learninglaravel.net/blog',
            'selector' => '.post > h2 > a',
            'action' => App\Actions\Feeds\Providers\LearningLaravel\GetLearningLaravelFeedsAction::class,
            'isActive' => true
        ],
        [
            'url' => 'https://dev.to/t/laravel',
            'domain' => 'https://dev.to',
            'selector' => '.crayons-story__title > a',
            'action' => App\Actions\Feeds\Providers\Dev\GetDevFeedsAction::class,
            'isActive' => true
        ],
        [
            'url' => 'https://laravel-news.com/links',
            'selector' => '.card a',
            'action' => App\Actions\Feeds\Providers\LaravelNewsLinks\LaravelNewsLinksFeedsAction::class,
            'isActive' => true
        ],
        [
            'url' => 'https://laravel-news.com/blog',
            'domain' => 'https://laravel-news.com',
            'selector' => '.card a',
            'action' => App\Actions\Feeds\Providers\LaravelNewsPosts\LaravelNewsPostsFeedsAction::class,
            'isActive' => true
        ],

    ],

];
