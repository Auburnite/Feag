<?php

/*******************************************************************************
 * Auburnite
 *
 * @link                https://github.com/Auburnite/Auburnite
 * @copywrite           Copywrite (c) 2023-present | Jordan Wamser - RedPanda Coding
 * @license             https://github.com/Auburnite/Auburnite/blob/main/LICENSE
 ******************************************************************************/
namespace Auburnite\Component\Feag\Tests\Unit\Storage;

use Auburnite\Component\Feag\Feature\BasicFlag;
use Auburnite\Component\Feag\Feature\FlagEnum;
use Auburnite\Component\Feag\Storage\ArrayStorage;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ArrayStorage::class)]
#[UsesClass(BasicFlag::class)]
class ArrayStorageTest extends TestCase
{
    private ArrayStorage $storage;

    protected function setUp(): void
    {
        $this->storage = new ArrayStorage();

    }

    public function testFlagNotInStorageReturnsControlValue(): void
    {
        self::assertEquals(BasicFlag::control('feature:test'),$this->storage->get('feature:test'));
    }

    public function testFlagCanBeSetInStorage(): void
    {
        $flag = new BasicFlag('feature:set-me-flag');
        $key = 'feature:set-me-string';
        $this->storage->set($flag);
        $this->storage->set($flag,$key);

        self::assertEquals($flag,$this->storage->get($flag));
        self::assertEquals($flag,$this->storage->get($key));
    }

    public function testFlagCanBeRemovedFromStorage(): void
    {
        $key = 'feature:remove-me-flag';
        $flag = new BasicFlag($key);
        $controlFlag = BasicFlag::control($key);
        $this->storage->set($flag,$key);

        $this->storage->remove($key);

        //make sure it was removed
        self::assertEquals(BasicFlag::control($key),$this->storage->get($key));
    }
}
