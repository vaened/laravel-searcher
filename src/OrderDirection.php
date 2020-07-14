<?php
/**
 * Created by enea dhack - 12/07/2020 19:30.
 */

namespace Vaened\Searcher;

use Vaened\Enum\Enum;

/**
 * Class OrderDirection
 *
 * @package Vaened\Searcher
 * @author enea dhack <enea.so@live.com>
 *
 * @method static OrderDirection ASC()
 * @method static OrderDirection DESC()
 */
final class OrderDirection extends Enum
{
    public const ASC = 'asc';

    public const DESC = 'desc';
}
