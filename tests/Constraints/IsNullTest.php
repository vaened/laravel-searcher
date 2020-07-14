<?php
/**
 * Created by enea dhack - 20/06/2020 18:17.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\IsNull;

class IsNullTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new IsNull('name');
    }

    protected function getExpectedResult(): array
    {
        return [];
    }
}
