<?php
/**
 * Created by enea dhack - 19/06/2020 20:53.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection as SupportCollection;
use Vaened\Searcher\Constraint;
use Vaened\Searcher\Tests\DataBaseTestCase;
use Vaened\Searcher\Tests\Utils\Models\Patient;

abstract class  ConstraintTestCase extends DataBaseTestCase
{
    abstract protected function constraint(): Constraint;

    abstract protected function getExpectedResult(): array;

    protected function transformResult(EloquentCollection $result): SupportCollection
    {
        return $result->pluck('history');
    }

    public function test_constraint_result(): void
    {
        $result = $this->constraint()->condition(Patient::query())->get();
        $expectedResult = $this->getExpectedResult();

        $this->assertCount(count($expectedResult), $result);
        $this->assertEquals($expectedResult, $this->transformResult($result)->toArray());
    }
}
