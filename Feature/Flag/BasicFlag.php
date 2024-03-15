<?php

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/
namespace Auburnite\Component\Feag\Feature\Flag;

use Auburnite\Component\Feag\Feature\FlagEnum;

final class BasicFlag implements BooleanFlagInterface
{
    private string $name;
    private string $value;

    public function __construct(
        string   $name,
        FlagEnum $value = FlagEnum::CONTROL
    )
    {
        $this->name = $name;
        $this->value = $value->value;
    }

    public static function control(string $name): BasicFlag
    {
        return new BasicFlag($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isEnabled(): bool
    {
        return match ($this->value) {
            FlagEnum::ON->value => true,
            default => false,
        };
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
