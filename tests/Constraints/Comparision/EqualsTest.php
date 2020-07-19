<?php
/**
 * Created by enea dhack - 19/06/2020 20:39.
 */

namespace Vaened\Searcher\Tests\Constraints\Comparision;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Comparison;
use Vaened\Searcher\Keywords\Operator;
use Vaened\Searcher\Tests\Constraints\ConstraintTestCase;

class EqualsTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Comparison('00000003', Operator::EQUAL(), 'history');
    }

    protected function getExpectedResult(): array
    {
        return ['00000003'];
    }
}
