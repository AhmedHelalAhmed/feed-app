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
     * @var ExtractFeedsDataAction
     */
    private $extractFeedsDataAction;

    /**
     * GetFeedsAction constructor.
     * @param ExtractFeedsDataAction $extractFeedsDataAction
     */
    public function __construct(ExtractFeedsDataAction $extractFeedsDataAction)
    {
        $this->extractFeedsDataAction = $extractFeedsDataAction;
    }

    /**
     * @return array
     */
    public function execute()
    {
        $feeds = collect();
        foreach (config('feeds.providers') as $provider) {
            $feeds = $feeds->merge(
                $this->extractFeedsDataAction
                    ->execute(
                        $provider['url'],
                        $provider['selector'],
                        intval(config('feeds.limit'))
                    )
            );
        }
        return $feeds->values()->toArray();
    }
}
