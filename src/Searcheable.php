<?php
/**
 * Created by enea dhack - 23/11/2019 17:47.
 */

namespace Vaened\Searcher;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, Collection};
use Vaened\Searcher\Constraints\{Between, Equals, Has, In, IsNotNull, IsNull, Like, Limit, OrderBy};

abstract class Searcheable extends Queryable
{
    protected array $unload = [];

    protected array $relationships = [];

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->statement()->paginate($perPage);
    }

    public function get(): Collection
    {
        return $this->statement()->get();
    }

    public function with(array $relations): self
    {
        $this->relationships = array_merge($this->relationships, $relations);
        return $this;
    }

    public function without(array $relations): self
    {
        $this->unload = array_merge($this->unload, $relations);
        return $this;
    }

    public function limit(int $limit): self
    {
        $this->apply(new Limit($limit));
        return $this;
    }

    public function orderBy(string $column, OrderDirection $direction = null): self
    {
        $this->apply(new OrderBy($column, $direction));
        return $this;
    }

    protected function in(array $values, string $column): void
    {
        $this->apply(new In($values, $column));
    }

    protected function equals(?string $value, string $column): void
    {
        $this->apply(new Equals($value, $column));
    }

    protected function isNotNull(string $column): void
    {
        $this->apply(new IsNotNull($column));
    }

    protected function isNull(string $column): void
    {
        $this->apply(new IsNull($column));
    }

    protected function like(string $value, string $column, Wildcard $wildcard = null): void
    {
        $this->apply(new Like($value, $column, $wildcard));
    }

    protected function between(Rangeable $range, string $column): void
    {
        $this->apply(new Between($range, $column));
    }

    protected function has(string $relation, Constraint $constraint = null): void
    {
        $this->apply(new Has($relation, $constraint));
    }

    protected function through(string $relation, Constraint $constraint): void
    {
        $this->has($relation, $constraint);
    }

    protected function statement(): Builder
    {
        return $this->getQuery()->create($this->relationships, $this->unload);
    }
}
