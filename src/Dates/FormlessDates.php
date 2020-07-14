<?php
/**
 * Created by enea dhack - 02/01/2020 21:25.
 */

namespace Vaened\Searcher\Dates;

use Carbon\Carbon;

class FormlessDates extends Dateable
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
        return $this->start;
    }

    public function getEndDate(): Carbon
    {
        return $this->end;
    }
}
