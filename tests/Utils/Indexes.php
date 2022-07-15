<?php
/**
 * Created by enea dhack - 07/06/2020 21:04.
 */

namespace Vaened\Searcher\Tests\Utils;

use Vaened\Enum\Enum;

/**
 * Class Indexes
 *
 * @package Tests\Unit\Components\Searcher\Utils
 * @author enea dhack <enea.so@live.com>
 *
 * @method static Indexes DOCUMENT()
 * @method static Indexes NAME()
 */
class Indexes extends Enum
{
    public const DOCUMENT = 'Identification Document';

    public const NAME = 'Full Name';
}
