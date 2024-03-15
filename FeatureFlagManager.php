<?php

/*
 * This file is part of the Auburnite package.
 *
 * (c) Jordan Wamser <jwamser@redpandacoding.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Auburnite\Component\Feag;

use Auburnite\Auburnite\Component\Exception\Exception;
use Auburnite\Component\Feag\Feature\Flag\FlagInterface;
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

    /**
     * @throws Exception
     */
    public function isFlagActive(string $flagName): bool
    {
        return $this->get($flagName)->isEnabled();
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
