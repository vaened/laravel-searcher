<?php
/**
 * Created by enea dhack - 19/07/2020 12:17.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;
use Vaened\Searcher\Keywords\Operator;

class Comparison implements Constraint
{
    private mixed $value;

    private Operator $operator;

    private string $column;

    public function __construct(mixed $value, Operator $operator, string $column)
    {
        $this->value = $value;
        $this->operator = $operator;
        $this->column = $column;
    }

    public function condition(Builder $builder): Builder
    {
        return $builder->where($this->column, $this->operator->value, $this->value);
    }
}
