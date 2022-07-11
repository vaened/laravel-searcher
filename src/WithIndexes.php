<?php
/**
 * Created by enea dhack - 13/06/2020 13:01.
 */

namespace Vaened\Searcher;

use UnitEnum;

trait WithIndexes
{
    abstract protected function getIndexProvider(): Indexable;

    public function search(UnitEnum $enum, ?string $q): self
    {
        if ($q !== null) {
            $this->apply($this->getIndexProvider()->getConstraint($enum, $q));
        }

        return $this;
    }
}
