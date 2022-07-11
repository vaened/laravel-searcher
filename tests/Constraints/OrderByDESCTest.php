<?php
/**
 * Created by enea dhack - 20/06/2020 18:30.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\OrderBy;
use Vaened\Searcher\Keywords\OrderDirection;

class OrderByDESCTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new OrderBy('history', OrderDirection::DESC);
    }

    protected function getExpectedResult(): array
    {
        return ['00000004', '00000003', '00000002', '00000001'];
    }
}
