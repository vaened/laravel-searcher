<?php
/**
 * Created by enea dhack - 28/12/2019 15:07.
 */

namespace Vaened\Searcher;

use Illuminate\Support\Arr;
use InvalidArgumentException;
use UnitEnum;

abstract class Indexable
{
    abstract protected function getAvailableConstraints(): ConstraintCollection;

    public function getConstraint(UnitEnum $key, string $q): Constraint
    {
        $constraints = $this->getAvailableConstraints()->all();
        if (! Arr::has($constraints, $key->name)) {
            throw new InvalidArgumentException("The requested index was not found: {$key->name}");
        }

        return Arr::get($constraints, $key->name)($q);
    }
}
