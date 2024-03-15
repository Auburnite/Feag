<?php

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/
namespace Auburnite\Component\Feag\Storage;

use Auburnite\Component\Feag\Exception\ConfigurationException;
use Auburnite\Component\Feag\Exception\InvalidStorageTypeException;
use Auburnite\Component\Feag\Feature\Flag\BasicFlag;
use Auburnite\Component\Feag\Feature\Flag\FlagInterface;
use IteratorAggregate;
use Ramsey\Collection\AbstractCollection;
use Ramsey\Collection\Exception\InvalidArgumentException;

/**
 * @extends     AbstractCollection<FlagInterface>
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
            throw new ConfigurationException(sprintf(
                'Flag %s, has already been used. You cannot have duplicated Flags.',
                $offset
            ));
        }

        $this->offsetSet($offset,$value);

        return $this;
    }
}
