<?php

namespace App\Actions\Feeds\Providers\Dev;

use App\Traits\ExecutableFeedsWithDomainTrait;

/**
 * Class GetDevFeedsAction
 * @package App\Actions\Feeds\Providers\Dev
 * @author Ahmed Helal Ahmed
 */
class GetDevFeedsAction
{
    use ExecutableFeedsWithDomainTrait;


    /**
     * @param $node
     * @param $domain
     */
    private function addToFeeds($node, $domain)
    {
        $this->feeds->add([
            'title' => $node->text(),
            'link' => $domain . $node->attr('href')
        ]);
    }
}
