<?php

/*
 * This file is part of the Auburnite package.
 *
 * (c) Jordan Wamser <jwamser@redpandacoding.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/

namespace Auburnite\Component\Feag\Feature\Flag;

interface FlagInterface
{
    // Double
    // Int
    // String
    // Boolean
    public function __construct(string $name);

    public function getName(): string;

    public function isEnabled(): bool;

    public function __toString(): string;
}
