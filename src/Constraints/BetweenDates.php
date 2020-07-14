<?php
/**
 * Created by enea dhack - 29/12/2019 12:24.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;
use Vaened\Searcher\Dates\BetweenDatesContract;

class BetweenDates implements Constraint
{
    private BetweenDatesContract $dates;

    private string $column;

    public function __construct(BetweenDatesContract $dates, string $column)
    {
        $this->dates = $dates;
        $this->column = $column;
    }

    public function condition(Builder $builder): Builder
    {
        return $builder->whereBetween($this->column, $this->dates->getRange());
    }
}
