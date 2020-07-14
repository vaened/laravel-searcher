<?php
/**
 * Created by enea dhack - 19/06/2020 19:22.
 */

namespace Vaened\Searcher\Tests\Dates;

use Carbon\Carbon;
use Vaened\Searcher\Dates\DailyDate;
use Vaened\Searcher\Dates\Dateable;

class DailyDateTest extends BetweenDatesTestCase
{
    protected function createBetweenDates(): Dateable
    {
        return new DailyDate(Carbon::create(4444, 4, 4, 12, 13, 14));
    }

    protected function getExpectedStartDate(): Carbon
    {
        return Carbon::create(4444, 4, 4)->startOfDay();
    }

    protected function getExpectedEndDate(): Carbon
    {
        return Carbon::create(4444, 4, 4)->endOfDay();
    }
}
