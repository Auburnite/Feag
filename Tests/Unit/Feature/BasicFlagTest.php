<?php

/*
 * This file is part of the Auburnite package.
 *
 * (c) Jordan Wamser <jwamser@redpandacoding.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Auburnite\Component\Feag\Tests\Unit\Feature;

use Auburnite\Component\Feag\Feature\Flag\BasicFlag;
use Auburnite\Component\Feag\Feature\FlagEnum;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BasicFlag::class)]
class BasicFlagTest extends TestCase
{
    public function testFlagActive(): void
    {
        $flag = new BasicFlag('test_flag', FlagEnum::ON);

        self::assertTrue($flag->isEnabled(), 'Flag is not active');
    }

    public function testFlagName(): void
    {
        $name = 'test_flag';
        $flag = new BasicFlag('test_flag', FlagEnum::ON);

        self::assertEquals($name, $flag->getName(), 'Flag getName is not returning the correct Flag Name');
        self::assertEquals($name, $flag, 'Flag toString does not return Flag name');
    }

    public function testFlagInActive(): void
    {
        $name = 'test_flag';
        $flag = new BasicFlag('test_flag', FlagEnum::OFF);

        self::assertEquals($name, $flag->getName(), 'Flag getName is not returning the correct Flag Name');
        self::assertEquals($name, $flag, 'Flag toString does not return Flag name');

        $name = 'test_flag';
        $flag = new BasicFlag('test_flag', FlagEnum::CONTROL);

        self::assertEquals($name, $flag->getName(), 'Flag getName is not returning the correct Flag Name');
        self::assertEquals($name, $flag, 'Flag toString does not return Flag name');
    }

    public function testBasicFlagInvalidValue(): void
    {
        $this->expectException(\TypeError::class);
        $flag = new BasicFlag('test_flag', 'on');
    }
}
