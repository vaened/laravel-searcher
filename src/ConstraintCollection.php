<?php
/**
 * Created by enea dhack - 09/01/2020 20:00.
 */

namespace Vaened\Searcher;

use Closure;
use InvalidArgumentException;
use UnitEnum;

final class ConstraintCollection
{
    private array $constraints = [];

    public static function create(): self
    {
        return new static();
    }

    public function put(UnitEnum $unit, Closure $constraint): void
    {
        $this->add($unit->name, $constraint);
    }

    private function add(string $key, Closure $constraint): void
    {
        if (isset($this->constraints[$key])) {
            throw new InvalidArgumentException("The [{$key}] key was already defined in the collection");
        }

        $this->constraints[$key] = $constraint;
    }

    public function all(): array
    {
        return $this->constraints;
    }
}
