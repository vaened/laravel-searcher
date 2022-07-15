<?php
/**
 * Created by enea dhack - 07/06/2020 20:11.
 */

namespace Vaened\Searcher\Tests\Utils;

use Vaened\Enum\Enum;

/**
 * Class Indexes
 *
 * @package Tests\Unit\Components\Searcher\Utils
 * @author enea dhack <enea.so@live.com>
 *
 * @method static Filter OBSERVED()
 * @method static Filter WITH_ACCOUNT()
 */
class Filter extends Enum
{
    public const OBSERVED = 'Observed';

    public const WITH_ACCOUNT = 'Only with account';
}
