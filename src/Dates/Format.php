<?php
/**
 * Created by enea dhack - 23/11/2019 18:35.
 */

namespace Vaened\Searcher\Dates;

use Vaened\Enum\Enum;

/**
 * Class Format
 *
 * @package Components\Dates
 * @author enea dhack <enea.so@live.com>
 *
 * @method static Format DMY()
 * @method static Format YMD()
 * @method static Format SYSTEM_DATETIME()
 * @method static Format PRESENTATION_DATETIME()
 * @method static Format SYSTEM_DATE()
 * @method static Format PRESENTATION_DATE()
 * @method static Format SYSTEM_TIME()
 * @method static Format PRESENTATION_TIME()
 */
class Format extends Enum
{
    public const DMY = 'd-m-Y';

    public const YMD = 'Y-m-d';

    public const  SYSTEM_DATETIME = 'Y-m-d H:i:s';

    public const PRESENTATION_DATETIME = 'd-m-Y h:i A';

    public const  SYSTEM_DATE = self::YMD;

    public const PRESENTATION_DATE = self::DMY;

    public const SYSTEM_TIME = 'H:i:s';

    public const PRESENTATION_TIME = 'h:i A';
}
