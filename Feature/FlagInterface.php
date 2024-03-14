<?php

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/
namespace Auburnite\Component\Feag\Feature;

interface FlagInterface
{
    public function __construct(string $name);
    public function getName(): string;
    public function isActive(): bool;
    public function __toString(): string;
}
