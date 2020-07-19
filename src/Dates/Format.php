<?php
/**
 * Created by enea dhack - 23/11/2019 18:35.
 */

namespace Vaened\Searcher\Dates;

use Carbon\Carbon;
use Vaened\Enum\Enum;

/**
 * Class Format
 *
 * @package Components\Dates
 * @author enea dhack <enea.so@live.com>
 *
 * @method static Format YMD()
 * @method static Format YMD_HIS()
 * @method static Format YMD_HIA()
 * @method static Format DMY()
 * @method static Format DMY_HIS()
 * @method static Format DMY_HIA()
 * @method static Format HIS()
 * @method static Format HIA()
 */
class Format extends Enum
{
    public const YMD = 'Y-m-d';

    public const YMD_HIS = 'Y-m-d H:i:s';

    public const YMD_HIA = 'Y-m-d H:i A';

    public const DMY = 'd-m-Y';

    public const DMY_HIS = 'd-m-Y H:i:s';

    public const DMY_HIA = 'd-m-Y H:i A';

    public const HIS = 'H:i:s';

    public const HIA = 'H:i A';

    public function apply(Carbon $date): string
    {
        return $date->format($this->value());
    }
}
