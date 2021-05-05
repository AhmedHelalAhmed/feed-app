<?php

namespace App\Actions\Feeds\Providers\LearningLaravel;

use App\Services\Feeds\Providers\ExtractFeedsDataBySelectorService;

/**
 * Class GetLearningLaravelFeedsAction
 * @package App\Actions\Feeds\Providers\LearningLaravel
 * @author Ahmed Helal Ahmed
 */
class GetLearningLaravelFeedsAction
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
