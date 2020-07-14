<?php
/**
 * Created by enea dhack - 20/06/2020 19:38.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;

class In implements Constraint
{
    private array $values;

    private string $column;

    public function __construct(array $values, string $column)
    {
        $this->values = $values;
        $this->column = $column;
    }

    public function condition(Builder $builder): Builder
    {
        return $builder->whereIn($this->column, $this->values);
    }
}
