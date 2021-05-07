<?php

namespace App\Actions\Feeds\Providers\LaravelNewsPosts;


use App\Traits\ExecutableFeedsWithDomainTrait;

/**
 * Class LaravelNewsPostsFeedsAction
 * @package App\Actions\Feeds\Providers\LaravelNewsPosts
 * @author Ahmed Helal Ahmed
 */
class LaravelNewsPostsFeedsAction
{

    use ExecutableFeedsWithDomainTrait;

    /**
     * @param $node
     * @param $domain
     */
    private function addToFeeds($node, $domain)
    {
        $this->feeds->add([
            'title' => $node->filter('.link')->first()->text(),
            'link' => $domain.$node->attr('href')
        ]);
    }
}
