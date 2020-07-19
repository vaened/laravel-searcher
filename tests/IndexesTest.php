<?php
/**
 * Created by enea dhack - 15/06/2020 18:22.
 */

namespace Vaened\Searcher\Tests;

use Closure;
use Vaened\Searcher\Constraints\Comparison;
use Vaened\Searcher\Constraints\Like;
use Vaened\Searcher\Tests\Utils\Indexes;
use Vaened\Searcher\Tests\Utils\IndexProvider;
use Vaened\Searcher\Tests\Utils\Models\Patient;
use Vaened\Searcher\Tests\Utils\Searcher;

class IndexesTest extends DataBaseTestCase
{
    public function test_index_provider(): void
    {
        $index = new IndexProvider();
        $likeConstraint = $index->getConstraint(Indexes::NAME()->key(), '');

        $this->assertInstanceOf(Like::class, $likeConstraint);
        $this->assertInstanceOf(Comparison::class, $index->getConstraint(Indexes::DOCUMENT()->key(), ''));
    }

    public function test_search_by_name(): void
    {
        $results = $this->search(Indexes::NAME(), 'Hana')->get();
        $names = $results->map($this->names())->toArray();

        $this->assertCount(2, $results);
        $this->assertEquals(['Hanae', 'Hanako'], $names);
    }

    public function test_search_by_document(): void
    {
        $results = $this->search(Indexes::DOCUMENT(), '87654321')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('87654321', $results->first()->document);
    }

    private function search(Indexes $index, string $q): Searcher
    {
        return $this->searcher()->search($index->key(), $q);
    }

    protected function names(): Closure
    {
        return fn(Patient $patient): string => $patient->name;
    }
}
