<?php
/**
 * Created by enea dhack - 29/12/2019 12:46.
 */

namespace Vaened\Searcher;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

abstract class Queryable
{
    private ?Query $query = null;

    abstract protected function builder(): Builder;

    protected function apply(Constraint $constraint): void
    {
        $this->getQuery()->push($constraint);
    }

    protected function removeNamedBinding(string $name): void
    {
        $this->getQuery()->attach(fn(Builder $builder) => $builder->withoutGlobalScope($name));
    }

    protected function getQuery(): Query
    {
        return $this->query ??= $this->createQueryBuilder();
    }

    private function createQueryBuilder(): Query
    {
        $bindings = $this->getBootableTraitsBindings();
        return new Query($this->builder(), $bindings->merge($this->defaultBindings())->toArray());
    }

    private function getBootableTraitsBindings(): Collection
    {
        $methods = $this->filterBootableTraits(static::class, fn(string $name) => "get{$name}DefaultBindings");
        return collect($methods)->map(fn(string $method): array => call_user_func([$this, $method]))->flatten();
    }

    private function filterBootableTraits(string $class, Closure $buildFunctionName): array
    {
        $booted = [];

        foreach (class_uses_recursive($class) as $trait) {
            $method = $buildFunctionName(class_basename($trait));
            if (method_exists($class, $method) && ! in_array($method, $booted)) {
                $booted[] = $method;
            }
        }

        return $booted;
    }

    protected function defaultBindings(): array
    {
        return [];
    }
}
