<?php
/**
 * Created by enea dhack - 19/07/2020 14:58.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Comparison;
use Vaened\Searcher\Constraints\Like;
use Vaened\Searcher\Constraints\Wrap;
use Vaened\Searcher\Keywords\Operator;
use Vaened\Searcher\Keywords\Wildcard;

class WrapTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new Wrap([
            new Like('repeated obs', 'observation', Wildcard::RIGHT),
            new Comparison('Aiko', Operator::EQUAL, 'name'),
        ]);
    }

    protected function getExpectedResult(): array
    {
        return ['00000001'];
    }
}
