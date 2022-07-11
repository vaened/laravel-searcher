<?php
/**
 * Created by enea dhack - 19/07/2020 14:21.
 */

namespace Vaened\Searcher\Tests\Constraints\Comparison;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Comparison;
use Vaened\Searcher\Keywords\Operator;
use Vaened\Searcher\Tests\Constraints\ConstraintTestCase;

class LessThanOrEqualTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Comparison('00000002', Operator::LESS_THAN_OR_EQUAL_TO, 'history');
    }

    protected function getExpectedResult(): array
    {
        return ['00000001', '00000002'];
    }
}
