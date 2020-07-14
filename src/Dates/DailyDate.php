<?php
/**
 * Created by enea dhack - 29/12/2019 12:37.
 */

namespace Vaened\Searcher\Dates;

use Carbon\Carbon;

class DailyDate extends Dateable
{
    private Carbon $date;

    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    public function getStartDate(): Carbon
    {
        return (clone $this->date)->startOfDay();
    }

    public function getEndDate(): Carbon
    {
        return (clone $this->date)->endOfDay();
    }
}
