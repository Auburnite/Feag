<?php

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/
namespace Auburnite\Component\Feag\Storage;

use Auburnite\Component\Feag\Feature\FlagInterface;

interface StorageInterface
{
    public function get(string $key): FlagInterface;
    public function set(FlagInterface $value, string $key): self;
    public function remove(string $key): void;
}
