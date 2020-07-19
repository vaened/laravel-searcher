<?php
/**
 * Created by enea dhack - 19/07/2020 14:43.
 */

namespace Vaened\Searcher;

class Range implements Rangeable
{
    private array $range;

    public function __construct(array $range)
    {
        $this->range = $range;
    }

    public static function create($value1, $value2): self
    {
        return new static([$value1, $value2]);
    }

    public function getRange(): array
    {
        return $this->range;
    }
}
