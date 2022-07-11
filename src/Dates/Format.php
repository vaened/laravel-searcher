<?php
/**
 * Created by enea dhack - 23/11/2019 18:35.
 */

namespace Vaened\Searcher\Dates;

use Carbon\Carbon;

enum Format: string
{
    case YMD = 'Y-m-d';

    case YMD_HIS = 'Y-m-d H:i:s';

    case YMD_HIA = 'Y-m-d H:i A';

    case DMY = 'd-m-Y';

    case DMY_HIS = 'd-m-Y H:i:s';

    case DMY_HIA = 'd-m-Y H:i A';

    case HIS = 'H:i:s';

    case HIA = 'H:i A';

    public function apply(Carbon $date): string
    {
        return $date->format($this->value);
    }
}
