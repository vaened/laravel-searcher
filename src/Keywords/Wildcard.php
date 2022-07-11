<?php
/**
 * Created by enea dhack - 12/07/2020 19:29.
 */

namespace Vaened\Searcher\Keywords;

enum Wildcard: string
{
    case  LEFT = '%%%s';

    case  RIGHT = '%s%%';

    case  BOTH = '%%%s%%';

    public function apply(string $q): string
    {
        return sprintf($this->value, $q);
    }
}

