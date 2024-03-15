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

use Auburnite\Component\Feag\Exception\ConfigurationException;
use Auburnite\Component\Feag\Feature\Flag\BasicFlag;
use Auburnite\Component\Feag\Feature\Flag\FlagInterface;
use IteratorAggregate;
use Ramsey\Collection\AbstractCollection;

/**
 * @extends     AbstractCollection<FlagInterface>
 *
 * @implements  IteratorAggregate<FlagInterface>
 */
abstract class Storage extends AbstractCollection implements StorageInterface
{
    //    public function getType(): string
    //    {
    //        return FlagInterface::class;
    //    }

    public function get(string $key): FlagInterface
    {
        if (!$this->offsetExists($key)) {
            return BasicFlag::control($key);
        }

        return $this->offsetGet($key);
    }

    public function set(FlagInterface $value, ?string $key = null): StorageInterface
    {
        $offset = $key ?? $value->getName();
        if ($this->offsetExists($key)) {
            throw new ConfigurationException(sprintf('Flag %s, has already been used. You cannot have duplicated Flags.', $offset));
        }

        $this->offsetSet($offset, $value);

        return $this;
    }
}
