<?php
/**
 * Created by enea dhack - 29/12/2019 12:24.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;
use Vaened\Searcher\Rangeable;

class Between implements Constraint
{
    private Rangeable $range;

    private string $column;

    public function __construct(Rangeable $range, string $column)
    {
        $this->range = $range;
        $this->column = $column;
    }

    public function condition(Builder $builder): Builder
    {
        return $builder->whereBetween($this->column, $this->range->getRange());
    }
}
