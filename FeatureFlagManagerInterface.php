<?php

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/
namespace Auburnite\Component\Feag;

use Auburnite\Component\Feag\Feature\Flag\FlagInterface;

interface FeatureFlagManagerInterface
{
    public function isFlagActive(string $flagName): bool;
    public function get(string $flagName): FlagInterface;

}
