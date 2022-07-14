<?php
/**
 * Created by enea dhack - 15/06/2020 16:16.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;

class Has implements Constraint
{
    private string $relationship;

    private ?Constraint $constraint;

    public function __construct(string $relationship, ?Constraint $constraint = null)
    {
        $this->relationship = $relationship;
        $this->constraint = $constraint;
    }

    public function condition(Builder $builder): Builder
    {
        if ($this->constraint == null) {
            return $builder->whereHas($this->relationship);
        }

        return $builder->whereHas($this->relationship, fn(Builder $builder) => $this->constraint->condition($builder));
    }
}
