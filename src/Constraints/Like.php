<?php
/**
 * Created by enea dhack - 03/01/2020 17:00.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;
use Vaened\Searcher\Wildcard;

class Like implements Constraint
{
    private string $value;

    private string $column;

    private ?Wildcard $wildcard;

    public function __construct(string $value, string $column, ?Wildcard $wildcard = null)
    {
        $this->value = $value;
        $this->column = $column;
        $this->wildcard = $wildcard;
    }

    public function condition(Builder $builder): Builder
    {
        $wildcard = $this->wildcard ?: Wildcard::RIGHT();
        return $builder->where($this->column, 'LIKE', $wildcard->apply($this->value));
    }
}
