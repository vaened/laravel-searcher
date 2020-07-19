<?php
/**
 * Created by enea dhack - 19/07/2020 14:20.
 */

namespace Vaened\Searcher\Tests\Constraints\Comparision;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Comparison;
use Vaened\Searcher\Keywords\Operator;
use Vaened\Searcher\Tests\Constraints\ConstraintTestCase;

class GreaterThanOrEqualTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Comparison('00000003', Operator::GREATER_THAN_OR_EQUAL_TO(), 'history');
    }

    protected function getExpectedResult(): array
    {
        return ['00000003', '00000004'];
    }
}
