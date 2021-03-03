<?php
/**
 * Created by enea dhack - 13/06/2020 13:01.
 */

namespace Vaened\Searcher;

trait WithIndexes
{
    abstract protected function getIndexProvider(): Indexable;

    public function search(string $index, ?string $q): self
    {
        if ($q != null) {
            $this->apply($this->getIndexProvider()->getConstraint($index, $q));
        }

        return $this;
    }
}
