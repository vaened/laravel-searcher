<?php
/**
 * Created by enea dhack - 15/06/2020 17:50.
 */

namespace Vaened\Searcher\Tests;

class SoftDeletesTest extends DataBaseTestCase
{
    public function test_list_all_records(): void
    {
        $results = $this->searcher()->withTrashed()->get();
        $this->assertCount(4, $results);
    }

    public function test_filter_not_deleted(): void
    {
        $results = $this->searcher()->withoutTrashed()->get();
        $this->assertCount(3, $results);
    }

    public function test_list_only_deleted(): void
    {
        $results = $this->searcher()->onlyTrashed()->get();
        $this->assertCount(1, $results);
    }
}
