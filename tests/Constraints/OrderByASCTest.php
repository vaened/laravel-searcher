<?php
/**
 * Created by enea dhack - 13/07/2020 19:12.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\OrderBy;
use Vaened\Searcher\Keywords\OrderDirection;

class OrderByASCTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new OrderBy('history', OrderDirection::ASC());
    }

    protected function getExpectedResult(): array
    {
        return ['00000001', '00000002', '00000003', '00000004'];
    }
}
