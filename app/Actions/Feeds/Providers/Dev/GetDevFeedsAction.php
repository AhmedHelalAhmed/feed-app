<?php

namespace App\Actions\Feeds\Providers\Dev;

use App\Services\Feeds\Providers\ExtractFeedsDataBySelectorService;

/**
 * Class GetDevFeedsAction
 * @package App\Actions\Feeds\Providers\Dev
 * @author Ahmed Helal Ahmed
 */
class GetDevFeedsAction
{
    /**
     * @var ExtractFeedsDataBySelectorService
     */
    private $extractFeedsDataBySelectorService;

    /**
     * GetLearningLaravelFeedsAction constructor.
     * @param ExtractFeedsDataBySelectorService $extractFeedsDataBySelectorService
     */
    public function __construct(ExtractFeedsDataBySelectorService $extractFeedsDataBySelectorService)
    {
        $this->extractFeedsDataBySelectorService = $extractFeedsDataBySelectorService;
    }

    /**
     * @param array $provider
     * @return mixed
     */
    public function execute(array $provider)
    {
        return $this->extractFeedsDataBySelectorService
            ->execute(
                $provider['url'],
                $provider['selector'],
                intval(config('feeds.limit'))
            );
    }
}
