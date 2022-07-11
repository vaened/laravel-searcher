<?php
/**
 * Created by enea dhack - 15/06/2020 18:22.
 */

namespace Vaened\Searcher\Tests;

use InvalidArgumentException;
use Vaened\Searcher\Constraints\{Comparison, Like};
use Vaened\Searcher\Tests\Utils\{Indexes, IndexProvider, Searcher};

class IndexesTest extends DataBaseTestCase
{
    public function test_index_provider(): void
    {
        $index = new IndexProvider();
        $likeConstraint = $index->getConstraint(Indexes::NAME, '');

        $this->assertInstanceOf(Like::class, $likeConstraint);
        $this->assertInstanceOf(Comparison::class, $index->getConstraint(Indexes::DOCUMENT, ''));
    }

    public function test_requesting_an_invalid_restriction_throws_an_exception(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The requested index was not found: DISABLE");

        $index = new IndexProvider();
        $index->getConstraint(Status::DISABLE, '');
    }

    public function test_search_by_name(): void
    {
        $results = $this->search(Indexes::NAME, 'Hana')->get();
        $this->assertCount(2, $results);
    }

    public function test_search_by_document(): void
    {
        $results = $this->search(Indexes::DOCUMENT, '87654321')->get();
        $this->assertCount(1, $results);
    }

    private function search(Indexes $index, string $q): Searcher
    {
        return $this->searcher()->search($index, $q);
    }
}

enum Status
{
    case DISABLE;
}
