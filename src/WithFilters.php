<?php
/**
 * Created by enea dhack - 12/06/2020 17:07.
 */

namespace Vaened\Searcher;

trait WithFilters
{
    abstract protected function getFilterProvider(): Filterable;

    public function filter(array $filters): self
    {
        $constraints = $this->getFilterProvider()->getConstraints($filters);
        foreach ($constraints as $constraint) {
            $this->apply($constraint);
        }
        return $this;
    }
}
