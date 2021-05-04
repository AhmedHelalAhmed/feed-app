<?php

namespace App\Http\Controllers;

use App\Actions\Feeds\GetFeedsAction;
use Inertia\Inertia;

/**
 * Class FeedController
 * @package App\Http\Controllers
 * @author Ahmed Helal Ahmed
 */
class FeedController extends Controller
{
    /**
     * @param GetFeedsAction $getFeedsAction
     * @return \Inertia\Response
     */
    public function __invoke(GetFeedsAction $getFeedsAction)
    {
        return Inertia::render('Feeds/Index', [
            'feeds' => $getFeedsAction->execute(),
        ]);
    }
}
