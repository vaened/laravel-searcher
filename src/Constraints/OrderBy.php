<?php
/**
 * Created by enea dhack - 19/06/2020 21:09.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;
use Vaened\Searcher\Keywords\OrderDirection;

class OrderBy implements Constraint
{
    private string $column;

    private ?OrderDirection $direction;

    public function __construct(string $column, ?OrderDirection $direction = null)
    {
        $this->column = $column;
        $this->direction = $direction;
    }

    public function condition(Builder $builder): Builder
    {
        return $builder->orderBy($this->column, $this->direction ?: OrderDirection::DESC);
    }
}
