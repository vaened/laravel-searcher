<?php
/**
 * Created by enea dhack - 19/06/2020 21:33.
 */

namespace Vaened\Searcher\Constraints;

use Illuminate\Database\Eloquent\Builder;
use Vaened\Searcher\Constraint;

class Limit implements Constraint
{
    private int $limit;

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    public function condition(Builder $builder): Builder
    {
        return $builder->limit($this->limit);
    }
}
