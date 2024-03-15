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

interface StringFlagInterface extends FlagInterface
{
    public function getValue(): string;
}
