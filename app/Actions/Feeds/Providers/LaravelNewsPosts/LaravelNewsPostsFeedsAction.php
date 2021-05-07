<?php

namespace App\Actions\Feeds\Providers\LaravelNewsPosts;

use Goutte\Client;

/**
 * Class LaravelNewsPostsFeedsAction
 * @package App\Actions\Feeds\Providers\LaravelNewsPosts
 * @author Ahmed Helal Ahmed
 */
class LaravelNewsPostsFeedsAction
{
    private $feeds;
    private $limit;

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
            ->each(function ($node) use ($provider) {
                if ($this->isReachLimit()) {
                    return false;
                }
                $this->addToFeeds($node, $provider['domain']);
            });

        return $this->feeds;
    }

    /**
     * @param $limit
     */
    private function setLimit($limit)
    {
        $this->limit = $limit;
    }

    private function resetFeeds()
    {
        $this->feeds = collect();
    }

    /**
     * @return bool
     */
    private function isReachLimit(): bool
    {
        return $this->feeds->count() === $this->limit;
    }

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
