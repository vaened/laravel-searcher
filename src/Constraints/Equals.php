<?php
/**
 * Created by enea dhack - 28/12/2019 14:33.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;

class Equals implements Constraint
{
    private ?string $value;

    private string $column;

    public function __construct(?string $value, string $column)
    {
        $this->column = $column;
        $this->value = $value;
    }

    public function condition(Builder $builder): Builder
    {
        if ($this->value == null) {
            return $builder->whereNull($this->column);
        }

        return $builder->where($this->column, '=', $this->value);
    }
}
