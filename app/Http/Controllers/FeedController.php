<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FeedController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Feeds/Index', [
            'data' =>['message'=>'hello from laravel'],
        ]);

    }
}
