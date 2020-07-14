<?php
/**
 * Created by enea dhack - 15/06/2020 20:06.
 */

namespace Vaened\Searcher\Tests;

use Vaened\Searcher\Constraints\Has;
use Vaened\Searcher\Constraints\IsNotNull;
use Vaened\Searcher\Tests\Utils\Filter;
use Vaened\Searcher\Tests\Utils\FilterProvider;
use Vaened\Searcher\Tests\Utils\Models\Patient;

class FiltersTest extends DataBaseTestCase
{
    public function test_filter_provider(): void
    {
        $filter = new FilterProvider();
        $filters = $filter->getConstraints([Filter::WITH_ACCOUNT()->key(), Filter::OBSERVED()->key()]);

        $this->assertInstanceOf(IsNotNull::class, $filters['OBSERVED']);
        $this->assertInstanceOf(Has::class, $filters['WITH_ACCOUNT']);
    }

    public function test_filter_only_with_account_patients(): void
    {
        $results = $this->searcher()->filter([Filter::WITH_ACCOUNT()->key()])->get();
        $this->assertCount(1, $results);
    }

    public function test_filter_only_observed_patients(): void
    {
        $results = $this->searcher()->filter([Filter::OBSERVED()->key()])->get();
        $this->assertCount(3, $results);
        $this->assertCount(0, $results->filter(fn(Patient $patient) => $patient->observation == null));
    }
}
