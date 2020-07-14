<?php
/**
 * Created by enea dhack - 12/07/2020 19:24.
 */

namespace Vaened\Searcher;

use Illuminate\Database\Eloquent\Builder;

interface Constraint
{
    public function condition(Builder $builder): Builder;
}