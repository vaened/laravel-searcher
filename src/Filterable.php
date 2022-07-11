<?php
/**
 * Created by enea dhack - 28/12/2019 15:06.
 */

namespace Vaened\Searcher;

use Closure;
use Illuminate\Support\Arr;
use UnitEnum;
use function array_map;

abstract class Filterable
{
    abstract protected function getAvailableConstraints(): ConstraintCollection;

    public function getConstraints(array $enums): array
    {
        $keys = array_map(static fn(UnitEnum $enum) => $enum->name, $enums);
        $collection = $this->getAvailableConstraints();
        $closures = Arr::only($collection->all(), $keys);
        return array_map(static fn(Closure $callable): Constraint => $callable(), $closures);
    }
}
