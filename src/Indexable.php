<?php
/**
 * Created by enea dhack - 28/12/2019 15:07.
 */

namespace Vaened\Searcher;

use Illuminate\Support\Arr;
use InvalidArgumentException;

abstract class Indexable
{
    abstract protected function getAvailableConstraints(): ConstraintCollection;

    public function getConstraint(string $key, string $q): Constraint
    {
        $constraints = $this->getAvailableConstraints()->all();
        if (! Arr::has($constraints, $key)) {
            throw new InvalidArgumentException("The requested index was not found: {$key}");
        }

        return Arr::get($constraints, $key)($q);
    }
}
