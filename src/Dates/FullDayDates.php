<?php
/**
 * Created by enea dhack - 14/06/2020 20:40.
 */

namespace Vaened\Searcher\Dates;

use Carbon\Carbon;

class FullDayDates extends Dateable
{
    private Carbon $start;

    private Carbon $end;

    public function __construct(Carbon $start, Carbon $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getStartDate(): Carbon
    {
        return $this->start->startOfDay();
    }

    public function getEndDate(): Carbon
    {
        return $this->end->endOfDay();
    }
}
