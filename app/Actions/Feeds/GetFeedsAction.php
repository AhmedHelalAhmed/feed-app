<?php

namespace App\Actions\Feeds;

/**
 * Class GetFeedsAction
 * @package App\Actions\Feeds
 * @author Ahmed Helal Ahmed
 */
class GetFeedsAction
{
    /**
     * @return array
     */
    public function execute(): array
    {
        $feeds = collect();
        $activeProviders = $this->getActiveProviders();
        foreach ($activeProviders as $provider) {
            $feeds = $feeds->merge(
                app($provider['action'])->execute($provider)
            );
        }
        return $feeds->values()->toArray();
    }

    private function getActiveProviders()
    {
        return array_filter(config('feeds.providers'), function ($provider) {
            return $provider['isActive'];
        });
    }
}
