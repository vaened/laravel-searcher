<?php
/**
 * Created by enea dhack - 20/06/2020 18:27.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Limit;

class LimitTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Limit(3);
    }

    protected function getExpectedResult(): array
    {
        return ['00000001', '00000002', '00000003'];
    }
}
