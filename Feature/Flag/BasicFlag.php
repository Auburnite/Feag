<?php

/*
 * This file is part of the Auburnite package.
 *
 * (c) Jordan Wamser <jwamser@redpandacoding.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Auburnite\Component\Feag\Feature\Flag;

use Auburnite\Component\Feag\Feature\FlagEnum;

final class BasicFlag implements BooleanFlagInterface
{
    private string $name;
    private string $value;

    public function __construct(
        string $name,
        FlagEnum $value = FlagEnum::CONTROL,
    ) {
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
