<?php


namespace App\Traits;

trait LimitableTrait
{
    private $limit;

    /**
     * @param $limit
     */
    private function setLimit($limit)
    {
        $this->limit = $limit;
    }
}
