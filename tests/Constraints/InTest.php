<?php
/**
 * Created by enea dhack - 20/06/2020 19:40.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\In;

class InTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new In(['00000001', '00000002', '00000003'], 'history');
    }

    protected function getExpectedResult(): array
    {
        return ['00000001', '00000002', '00000003'];
    }
}
