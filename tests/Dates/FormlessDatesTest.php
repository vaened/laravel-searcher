<?php
/**
 * Created by enea dhack - 19/06/2020 19:20.
 */

namespace Vaened\Searcher\Tests\Dates;

use Carbon\Carbon;
use Vaened\Searcher\Dates\Dateable;
use Vaened\Searcher\Dates\FormlessDates;

class FormlessDatesTest extends BetweenDatesTestCase
{
    protected function createBetweenDates(): Dateable
    {
        return new FormlessDates(Carbon::create(2010, 01, 01, 13, 50, 15), Carbon::create(2010, 01, 04, 10, 10, 10));
    }

    protected function getExpectedStartDate(): Carbon
    {
        return Carbon::create(2010, 01, 01, 13, 50, 15);
    }

    protected function getExpectedEndDate(): Carbon
    {
        return Carbon::create(2010, 01, 04, 10, 10, 10);
    }
}
