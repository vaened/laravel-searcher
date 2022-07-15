<?php
/**
 * Created by enea dhack - 07/06/2020 19:50.
 */

namespace Vaened\Searcher\Tests\Utils;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\{Filterable, Indexable, Searcheable};
use Vaened\Searcher\{SoftDeletes, WithFilters, WithIndexes};
use Vaened\Searcher\Dates\BetweenDatesContract;
use Vaened\Searcher\Keywords\Wildcard;
use Vaened\Searcher\Tests\Utils\Models\Patient;

class Searcher extends Searcheable
{
    use SoftDeletes, WithFilters, WithIndexes;

    private IndexProvider $index;

    private FilterProvider $filter;

    public function __construct(IndexProvider $index, FilterProvider $filter)
    {
        $this->index = $index;
        $this->filter = $filter;
    }

    public function affiliatedBetween(BetweenDatesContract $dates): self
    {
        $this->between($dates, 'affiliated_at');
        return $this;
    }

    public function observationLikeTo(string $q): self
    {
        $this->like($q, 'observation', Wildcard::RIGHT());
        return $this;
    }

    public function onlyWithAccount(): self
    {
        $this->has('account');
        return $this;
    }

    public function onlyObserved(): self
    {
        $this->isNotNull('observation');
        return $this;
    }

    public function withoutObservation(): self
    {
        $this->isNull('observation');
        return $this;
    }

    public function historyEqualsTo(string $q): self
    {
        $this->equals($q, 'history');
        return $this;
    }

    public function documentNotEqualsTo(string $q): self
    {
        $this->notEquals($q, 'document');
        return $this;
    }

    public function inDocuments(array $documents): self
    {
        $this->in($documents, 'document');
        return $this;
    }

    public function loadAccounts(): self
    {
        return $this->with(['account']);
    }

    protected function getIndexProvider(): Indexable
    {
        return $this->index;
    }

    protected function getFilterProvider(): Filterable
    {
        return $this->filter;
    }

    protected function builder(): Builder
    {
        return Patient::query();
    }
}
