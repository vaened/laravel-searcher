<?php
/**
 * Created by enea dhack - 19/06/2020 18:51.
 */

namespace Vaened\Searcher\Tests\Dates;

use Carbon\Carbon;
use Vaened\Searcher\Dates\Dateable;
use Vaened\Searcher\Dates\FullDayDates;

class FullDayDatesTest extends BetweenDatesTestCase
{
    protected function createBetweenDates(): Dateable
    {
        return new FullDayDates(Carbon::create(2000, 01, 01, 13, 50, 15), Carbon::create(2000, 01, 04, 10, 10, 10));
    }

    protected function getExpectedStartDate(): Carbon
    {
        return Carbon::create(2000, 01, 01)->startOfDay();
    }

    protected function getExpectedEndDate(): Carbon
    {
        return Carbon::create(2000, 01, 04)->EndOfDay();
    }
}
