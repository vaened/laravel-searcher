<?php
/**
 * Created by enea dhack - 12/07/2020 19:29.
 */

namespace Vaened\Searcher\Keywords;

use Vaened\Enum\Enum;

/**
 * Class Wildcard
 *
 * @package Vaened\Searcher
 * @author enea dhack <enea.so@live.com>
 *
 * @method static Wildcard LEFT()
 * @method static Wildcard RIGHT()
 * @method static Wildcard BOTH()
 */
final class Wildcard extends Enum
{
    public const LEFT = '%%%s';

    public const RIGHT = '%s%%';

    public const BOTH = '%%%s%%';

    public function apply(string $q): string
    {
        return sprintf($this->value(), $q);
    }
}

