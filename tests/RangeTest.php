<?php
/**
 * Created by enea dhack - 19/07/2020 14:53.
 */

namespace Vaened\Searcher\Tests;

use Vaened\Searcher\Range;

class RangeTest extends TestCase
{
    public function test_create_range(): void
    {
        $range = Range::create('A', 'C');
        $this->assertEquals(['A', 'C'], $range->getRange());
    }
}
