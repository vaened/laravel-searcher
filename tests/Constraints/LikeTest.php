<?php
/**
 * Created by enea dhack - 20/06/2020 18:22.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Like;
use Vaened\Searcher\Keywords\Wildcard;

class LikeTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Like('repeated obs', 'observation', Wildcard::RIGHT());
    }

    protected function getExpectedResult(): array
    {
        return ['00000001', '00000002'];
    }
}
