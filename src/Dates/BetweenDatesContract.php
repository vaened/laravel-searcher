<?php
/**
 * Created by enea dhack - 29/12/2019 12:11.
 */

namespace Vaened\Searcher\Dates;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

interface BetweenDatesContract extends JsonSerializable, Arrayable, Jsonable
{
    public function getRange(): array;

    public function getStartDate(): Carbon;

    public function getEndDate(): Carbon;
}
