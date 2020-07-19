<?php
/**
 * Created by enea dhack - 07/06/2020 20:00.
 */

namespace Vaened\Searcher\Tests\Utils;

use Closure;
use Vaened\Searcher\{Indexable, Keywords\Operator, Wildcard};
use Vaened\Searcher\ConstraintCollection;
use Vaened\Searcher\Constraints\{Comparison, Like};

class IndexProvider extends Indexable
{
    protected function getAvailableConstraints(): ConstraintCollection
    {
        $collection = ConstraintCollection::create();
        $collection->put(Indexes::NAME()->key(), $this->isEqualsToName());
        $collection->put(Indexes::DOCUMENT()->key(), $this->isEqualsToDocumentNumber());
        return $collection;
    }

    protected function isEqualsToDocumentNumber(): Closure
    {
        return fn(string $q) => new Comparison($q, Operator::EQUAL(), 'document');
    }

    protected function isEqualsToName(): Closure
    {
        return fn(string $q) => new Like($q, 'name', Wildcard::RIGHT());
    }
}
