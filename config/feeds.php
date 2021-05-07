<?php

return [
    'limit' => env('feeds_limit', 3),
    'providers' => [
        [
            'url' => 'https://learninglaravel.net/blog',
            'selector' => '.post > h2 > a',
            'action' => App\Actions\Feeds\Providers\LearningLaravel\GetLearningLaravelFeedsAction::class,
            'isActive' => true
        ],
        [
            'url' => 'https://dev.to/t/laravel',
            'selector' => '.crayons-story__title > a',
            'action' => App\Actions\Feeds\Providers\Dev\GetDevFeedsAction::class,
            'isActive' => true
        ],
        [
            'url' => 'https://laravel-news.com/links',
            'selector' => '.card a',
            'action' => App\Actions\Feeds\Providers\laravelNewsLinks\LaravelNewsLinksFeedsAction::class,
            'isActive' => true
        ],

    ],

];
