<?php
/**
 * Created by enea dhack - 07/06/2020 20:14.
 */

namespace Vaened\Searcher\Tests\Utils;

use Closure;
use Vaened\Searcher\ConstraintCollection;
use Vaened\Searcher\Constraints\Has;
use Vaened\Searcher\Constraints\IsNotNull;
use Vaened\Searcher\Filterable;

class FilterProvider extends Filterable
{
    protected function getAvailableConstraints(): ConstraintCollection
    {
        $collection = ConstraintCollection::create();
        $collection->put(Filter::OBSERVED, $this->onlyObserved());
        $collection->put(Filter::WITH_ACCOUNT, $this->onlyWithAccount());
        return $collection;
    }

    private function onlyObserved(): Closure
    {
        return fn() => new IsNotNull('observation');
    }

    private function onlyWithAccount(): Closure
    {
        return fn() => new Has('account');
    }
}
