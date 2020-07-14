<?php
/**
 * Created by enea dhack - 28/12/2019 16:06.
 */

namespace Vaened\Searcher;

use Vaened\Searcher\Binding;
use Vaened\Searcher\Constraints\IsNotNull;
use Vaened\Searcher\Constraints\IsNull;

trait SoftDeletes
{
    public function withTrashed(): self
    {
        $this->removeNamedBinding(SoftDeletes::class);
        return $this;
    }

    public function withoutTrashed(): self
    {
        $this->removeNamedBinding(SoftDeletes::class);
        $this->apply(new IsNull($this->getDeletedAtColumnName()));
        return $this;
    }

    public function onlyTrashed(): self
    {
        $this->removeNamedBinding(SoftDeletes::class);
        $this->apply(new IsNotNull($this->getDeletedAtColumnName()));
        return $this;
    }

    protected function getSoftDeletesDefaultBindings(): array
    {
        if (! $this->isTrashFilterActivated()) {
            return [];
        }

        return [
            Binding::named(SoftDeletes::class, [
                new IsNull($this->getDeletedAtColumnName()),
            ]),
        ];
    }

    protected function getDeletedAtColumnName(): string
    {
        return 'deleted_at';
    }

    protected function isTrashFilterActivated(): bool
    {
        return true;
    }
}
