<?php
/**
 * Created by enea dhack - 17/06/2020 17:03.
 */

namespace Vaened\Searcher;

final class Binding
{
    private ?string $name;

    private array $constraints;

    public function __construct(?string $name, array $constraints)
    {
        $this->name = $name;
        $this->constraints = $constraints;
    }

    public static function named(string $name, array $constraints): Binding
    {
        return new static($name, $constraints);
    }

    public static function unnamed(Constraint $constraint): Binding
    {
        return new static(null, [$constraint]);
    }

    public function isNamed(): bool
    {
        return $this->getName() != null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getConstraints(): array
    {
        return $this->constraints;
    }
}
