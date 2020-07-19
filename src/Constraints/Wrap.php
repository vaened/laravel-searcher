<?php
/**
 * Created by enea dhack - 18/07/2020 21:32.
 */

namespace Vaened\Searcher\Constraints;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;

class Wrap implements Constraint
{
    private array $constraints;

    public function __construct(array $constraints)
    {
        $this->constraints = $constraints;
    }

    public function condition(Builder $builder): Builder
    {
        return $builder->where($this->apply($this->constraints));
    }

    private function apply(array $constraints): Closure
    {
        return fn(Builder $builder) => $this->bind($builder, $constraints);
    }

    private function bind(Builder $builder, array $constraints): void
    {
        foreach ($constraints as $constraint) {
            $constraint->condition($builder);
        }
    }
}
