<?php

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/
namespace Auburnite\Component\Feag\Feature;

enum FlagEnum: string
{
    /**
     * Default value for Flag that doesn't match a lookup
     */
    case CONTROL    = 'control';
    case ON         = 'on';
    case OFF        = 'off';
}
