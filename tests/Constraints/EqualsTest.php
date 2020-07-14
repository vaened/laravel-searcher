<?php
/**
 * Created by enea dhack - 19/06/2020 20:39.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Equals;

class EqualsTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Equals('00000003', 'history');
    }

    protected function getExpectedResult(): array
    {
        return ['00000003'];
    }
}
