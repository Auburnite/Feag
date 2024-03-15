<?php

/*
 * This file is part of the Auburnite package.
 *
 * (c) Jordan Wamser <jwamser@redpandacoding.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Auburnite\Component\Feag\Feature;

enum FlagEnum: string
{
    /**
     * Default value for Flag that doesn't match a lookup.
     */
    case CONTROL = 'control';
    case ON = 'on';
    case OFF = 'off';
}
