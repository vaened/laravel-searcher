<?php
/**
 * Created by enea dhack - 20/06/2020 18:19.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection as SupportCollection;
use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\IsNotNull;

class IsNotNullTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        return new IsNotNull('deleted_at');
    }

    protected function getExpectedResult(): array
    {
        return ['4444-01-04 16:01:00'];
    }

    protected function transformResult(EloquentCollection $result): SupportCollection
    {
        return $result->pluck('deleted_at');
    }
}
