<?php

/*
 * This file is part of the Auburnite package.
 *
 * (c) Jordan Wamser <jwamser@redpandacoding.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Auburnite\Component\Feag\Storage;

use Auburnite\Component\Feag\Feature\Flag\FlagInterface;

interface StorageInterface
{
    public function get(string $key): FlagInterface;

    public function set(FlagInterface $value, string $key): self;
}
