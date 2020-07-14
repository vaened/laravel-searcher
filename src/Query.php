<?php
/**
 * Created by enea dhack - 19/06/2020 20:59.
 */

namespace Vaened\Searcher;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use UnexpectedValueException;

final class Query
{
    private Builder $builder;

    public function __construct(Builder $builder, array $bindings)
    {
        $this->dumpBindingsTo($builder, $bindings);
        $this->builder = $builder;
    }

    public function create(array $loadRelationships = [], array $unloadRelationships = []): Builder
    {
        return $this->builder->with($loadRelationships)->without($unloadRelationships);
    }

    public function push(Constraint $constraint): void
    {
        $this->builder = $constraint->condition($this->builder);
    }

    public function remove(string $bindingName): void
    {
        $this->builder->withoutGlobalScope($bindingName);
    }

    public function attach(Closure $closure): void
    {
        $builder = $closure($this->builder);

        if (! $builder instanceof Builder) {
            throw new UnexpectedValueException("Attachment must be an instance of " . Builder::class);
        }

        $this->builder = $builder;
    }

    private function dumpBindingsTo(Builder &$builder, array $bindings): void
    {
        foreach ($bindings as $binding) {
            if (! $binding instanceof Binding) {
                throw new UnexpectedValueException("Bindings must be an instance of " . Binding::class);
            }

            $this->setBindingTo($binding, $builder);
        }
    }

    private function setBindingTo(Binding $binding, Builder $builder): void
    {
        if (! $binding->isNamed()) {
            $this->applyConstraints($builder, $binding->getConstraints());
        } else {
            $builder->withGlobalScope($binding->getName(), fn(Builder $eloquent
            ) => $this->applyConstraints($eloquent, $binding->getConstraints()));
        }
    }

    private function applyConstraints(Builder $builder, array $bindings): void
    {
        foreach ($bindings as $constraint) {
            $constraint->condition($builder);
        }
    }
}
