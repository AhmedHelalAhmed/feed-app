<?php

namespace App\Actions\Feeds\Providers\LaravelNewsLinks;

use App\Traits\FeedableTrait;
use App\Traits\LimitableTrait;
use Goutte\Client;

/**
 * Class LaravelNewsLinksFeedsAction
 * @package App\Actions\Feeds\Providers\LaravelNewsLinks
 * @author Ahmed Helal Ahmed
 */
class LaravelNewsLinksFeedsAction
{
    use FeedableTrait;
    use LimitableTrait;

    /**
     * @param array $provider
     * @return mixed
     */
    public function execute(array $provider)
    {
        $this->setLimit(intval(config('feeds.limit')));
        $this->resetFeeds();
        $crawler = (new Client())->request('GET', $provider['url']);
        $crawler->filter($provider['selector'])
            ->each(function ($node) {
                if ($this->isReachLimit()) {
                    return false;
                }
                $this->addToFeeds($node);
            });

        return $this->feeds;
    }


    /**
     * @param $node
     */
    private function addToFeeds($node)
    {
        $this->feeds->add([
            'title' => $node->filter('.mb-4')->first()->text(),
            'link' => $node->attr('href')
        ]);
    }
}
