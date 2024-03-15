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
use Auburnite\Component\Feag\Feature\Flag\BasicFlag;
use Auburnite\Component\Feag\Feature\Flag\FlagInterface;
use Auburnite\Component\Feag\Feature\FlagEnum;

final class ArrayStorage implements StorageInterface
{
    /**
     * @var array<FlagInterface> $storage
     */
    private array $storage = [];

    public function get(string $key): FlagInterface
    {
        return $this->storage[$key] ?? BasicFlag::control($key);
    }

    /**
     * @throws ConfigurationException
     */
    public function set(FlagInterface $value, ?string $key = null): ArrayStorage
    {
        $index = $key ?? $value->getName();
        if (array_key_exists($index,$this->storage)) {
            throw new ConfigurationException(sprintf(
                'Flag %s, has already been used. You cannot have duplicated Flags.',
                $index
            ));
        }

        $this->storage[$index] = $value;

        return $this;
    }

    public function remove(string $key): void
    {
        if (isset($this->storage[$key])) {
            unset($this->storage[$key]);
        }
    }

    public static function load(array $flags = []): self
    {
        $container = new ArrayStorage();

        foreach ($flags as $key => $flag) {
            if (!is_string($flag)) {
                throw new ConfigurationException(sprintf(
                    'the yaml flag file is not setup correctly',
                ));
            }

            $container->set(new BasicFlag($key,FlagEnum::tryFrom($flag) ?? FlagEnum::CONTROL));
        }

        return $container;
    }

}
