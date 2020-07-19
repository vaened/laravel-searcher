<?php
/**
 * Created by enea dhack - 20/06/2020 18:12.
 */

namespace Vaened\Searcher\Tests\Constraints;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection as SupportCollection;
use Vaened\Searcher\Constraint;
use Vaened\Searcher\Constraints\Between;
use Vaened\Searcher\Dates\DailyDate;

class BetweenTest extends ConstraintTestCase
{
    protected function constraint(): Constraint
    {
        $dates = new DailyDate(Carbon::create(4001, 01, 01));
        return new Between($dates, 'affiliated_at');
    }

    protected function getExpectedResult(): array
    {
        return ['4001-01-01 10:00:00'];
    }

    protected function transformResult(EloquentCollection $result): SupportCollection
    {
        return $result->pluck('affiliated_at');
    }
}
