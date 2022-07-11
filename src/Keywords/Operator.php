<?php
/**
 * Created by enea dhack - 18/07/2020 22:54.
 */

namespace Vaened\Searcher\Keywords;


enum Operator: string
{
    case EQUAL = '=';

    case NOT_EQUAL = '<>';

    case GREATER_THAN = '>';

    case LESS_THAN = '<';

    case GREATER_THAN_OR_EQUAL_TO = '>=';

    case LESS_THAN_OR_EQUAL_TO = '<=';
}
