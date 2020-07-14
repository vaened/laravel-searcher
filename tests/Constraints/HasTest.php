<?php
/**
 * Created by enea dhack - 20/06/2020 18:31.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Has;

class HasTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Has('account');
    }

    protected function getExpectedResult(): array
    {
        return ['00000003'];
    }
}
