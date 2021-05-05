<?php

namespace App\Services\Feeds\Providers;

use Goutte\Client;

/**
 * Class ExtractFeedsDataBySelectorService
 * @package App\Services\Feeds\Providers
 * @author Ahmed Helal Ahmed
 */
class ExtractFeedsDataBySelectorService
{
    private $feeds;
    private $limit;

    /**
     * @param string $website
     * @param string $selector
     * @param int $limit
     * @return mixed
     */
    public function execute(string $website,string $selector,int $limit)
    {
        $this->setLimit($limit);
        $this->resetFeeds();
        $crawler = (new Client())->request('GET', $website);
        $crawler->filter($selector)
            ->each(function ($node) {
                if ($this->isReachLimit()) {
                    return false;
                }
                $this->addToFeeds($node);
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
     */
    private function addToFeeds($node)
    {
        $this->feeds->add([
            'title' => $node->text(),
            'link' => $node->attr('href')
        ]);
    }
}
