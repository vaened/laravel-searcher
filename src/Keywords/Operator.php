<?php
/**
 * Created by enea dhack - 18/07/2020 22:54.
 */

namespace Vaened\Searcher\Keywords;

use Vaened\Enum\Enum;

/**
 * Class Operator
 *
 * @package Vaened\Searcher\Keywords
 * @author enea dhack <enea.so@live.com>
 *
 * @method static Operator EQUAL()
 * @method static Operator NOT_EQUAL()
 * @method static Operator GREATER_THAN()
 * @method static Operator LESS_THAN()
 * @method static Operator GREATER_THAN_OR_EQUAL_TO()
 * @method static Operator LESS_THAN_OR_EQUAL_TO()
 */
class Operator extends Enum
{
    public const EQUAL = '=';

    public const NOT_EQUAL = '<>';

    public const GREATER_THAN = '>';

    public const LESS_THAN = '<';

    public const GREATER_THAN_OR_EQUAL_TO = '>=';

    public const LESS_THAN_OR_EQUAL_TO = '<=';
}
