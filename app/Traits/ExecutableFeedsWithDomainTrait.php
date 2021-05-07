<?php


namespace App\Traits;

use Goutte\Client;

trait ExecutableFeedsWithDomainTrait
{
    use LimitableTrait;
    use FeedableTrait;
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
}
