<?php
/**
 * Created by enea dhack - 07/06/2020 20:11.
 */

namespace Vaened\Searcher\Tests\Utils;

enum Filter: string
{
    case OBSERVED = 'Observed';

    case WITH_ACCOUNT = 'Only with account';
}
