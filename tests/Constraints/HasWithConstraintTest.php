<?php
/**
 * Created by enea dhack - 13/07/2020 18:57.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Has;
use Vaened\Searcher\Constraints\IsNull;

class HasWithConstraintTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Has('account', new IsNull('patient_id'));
    }

    protected function getExpectedResult(): array
    {
        return [];
    }
}
