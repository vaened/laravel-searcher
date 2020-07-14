<?php
/**
 * Created by enea dhack - 03/01/2020 18:21.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;

class IsNotNull implements Constraint
{
    private string $column;

    public function __construct(string $column)
    {
        $this->column = $column;
    }

    public function condition(Builder $builder): Builder
    {
        return $builder->whereNotNull($this->column);
    }
}
