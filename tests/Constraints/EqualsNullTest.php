<?php
/**
 * Created by enea dhack - 13/07/2020 18:33.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Equals;

class EqualsNullTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Equals(null, 'history');
    }

    protected function getExpectedResult(): array
    {
        return [];
    }
}
