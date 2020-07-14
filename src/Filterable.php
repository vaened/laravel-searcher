<?php
/**
 * Created by enea dhack - 28/12/2019 15:06.
 */

namespace Vaened\Searcher;

use Closure;
use Illuminate\Support\Arr;

abstract class Filterable
{
    abstract protected function getAvailableConstraints(): ConstraintCollection;

    public function getConstraints(array $keys): array
    {
        $collection = $this->getAvailableConstraints();
        $closures = Arr::only($collection->all(), $keys);
        return array_map(fn(Closure $callable): Constraint => $callable(), $closures);
    }
}
