<?php
/**
 * Created by enea dhack - 29/12/2019 12:11.
 */

namespace Vaened\Searcher\Dates;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use Vaened\Searcher\Rangeable;

interface BetweenDatesContract extends Rangeable, JsonSerializable, Arrayable, Jsonable
{
    public function getStartDate(): Carbon;

    public function getEndDate(): Carbon;
}
