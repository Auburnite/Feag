<?php

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/
namespace Auburnite\Component\Feag;

use Auburnite\Auburnite\Component\Exception\Exception;
use Auburnite\Component\Feag\Feature\FlagInterface;
use Auburnite\Component\Feag\Storage\StorageInterface;

class FeatureFlagManager implements FeatureFlagManagerInterface
{
    private StorageInterface $flagContainer;

    /**
     * @param ?StorageInterface $flagContainer
     */
    public function __construct(?StorageInterface $flagContainer)
    {
        $this->flagContainer = $flagContainer;
    }

    public function isFlagActive(string $flagName): bool
    {
        return $this->get($flagName)->isActive();
    }

    /**
     * @throws Exception
     */
    public function get(string $flagName): FlagInterface
    {
        if (null === ($this->flagContainer ?? null)) {
            throw new Exception('You forgot to setup the FlagContainer using a StorageInterface');
        }

        return $this->flagContainer->get($flagName);
    }
}