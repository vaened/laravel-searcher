<?php
/**
 * Created by enea dhack - 13/07/2020 18:39.
 */

namespace Vaened\Searcher\Tests;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Vaened\Searcher\Dates\FullDayDates;
use Vaened\Searcher\Keywords\OrderDirection;
use Vaened\Searcher\Tests\Utils\Models\Account;
use Vaened\Searcher\Tests\Utils\Models\Patient;
use Vaened\Searcher\Tests\Utils\OrderColumn;

class SearcheableTest extends DataBaseTestCase
{
    public function test_paginate_searcher(): void
    {
        $paginator = $this->searcher()->paginate();
        $this->assertInstanceOf(LengthAwarePaginator::class, $paginator);
    }

    public function test_filter_between_dates(): void
    {
        $dates = new FullDayDates(Carbon::create(4001, 1, 2), Carbon::create(4001, 1, 3));
        $results = $this->searcher()->affiliatedBetween($dates)->get();

        $this->assertCount(2, $results);
    }

    public function test_load_accounts(): void
    {
        $result = $this->searcher()->loadAccounts()->get();
        $accounts = $result->map(fn(Patient $patient
        ): ?Account => $patient->getRelations()['account'] ?? null)->filter();

        $this->assertCount(1, $accounts);
    }

    public function test_unload_accounts(): void
    {
        $result = $this->searcher()->loadAccounts()->without(['account'])->get();
        $accounts = $result->map(fn(Patient $patient) => in_array('account', $patient->getRelations()))->filter();

        $this->assertCount(0, $accounts);
    }

    public function test_sort_descending_by_column(): void
    {
        $results = $this->searcher()->orderBy(OrderColumn::AFFILIATED(), OrderDirection::DESC())->get();
        $this->assertCount(3, $results);
    }

    public function test_search_by_observation(): void
    {
        $result = $this->searcher()->observationLikeTo('repeated');
        $this->assertCount(2, $result->get());
    }

    public function test_search_by_history(): void
    {
        $result = $this->searcher()->historyEqualsTo('00000003');
        $this->assertCount(1, $result->get());
    }

    public function test_search_different_document(): void
    {
        $result = $this->searcher()->documentNotEqualsTo('87654321');
        $this->assertCount(2, $result->get());
    }

    public function test_search_in_documents(): void
    {
        $result = $this->searcher()->inDocuments(['87654321', '12345678']);
        $this->assertCount(2, $result->get());
    }

    public function test_search_only_observed(): void
    {
        $result = $this->searcher()->onlyObserved();
        $this->assertCount(3, $result->get());
    }

    public function test_search_without_observation(): void
    {
        $result = $this->searcher()->withoutObservation();
        $this->assertCount(0, $result->get());
    }

    public function test_search_only_with_account(): void
    {
        $result = $this->searcher()->onlyWithAccount();
        $this->assertCount(1, $result->get());
    }

    public function test_limit_search(): void
    {
        $result = $this->searcher()->limit(2);
        $this->assertCount(2, $result->get());
    }
}
