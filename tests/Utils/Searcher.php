<?php
/**
 * Created by enea dhack - 07/06/2020 19:50.
 */

namespace Vaened\Searcher\Tests\Utils;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\{Filterable, Indexable, Searcheable, Wildcard};
use Vaened\Searcher\{SoftDeletes, WithFilters, WithIndexes};
use Vaened\Searcher\Dates\BetweenDatesContract;
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

    public function historyEqualsTo(string $q)
    {
        $this->equals($q, 'history');
        return $this;
    }

    public function inDocuments(array $documents): self
    {
        $this->in($documents, 'document');
        return $this;
    }

    protected function getIndexProvider(): Indexable
    {
        return $this->index;
    }

    public function loadAccounts(): self
    {
        return $this->with(['account']);
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
