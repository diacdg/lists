<?php

namespace Tests\Util;

use PHPUnit\Framework\TestCase;
use Diacdg\Util\SimpleList;

class SimpleListTest extends TestCase
{
    /**
     * @dataProvider listDataProvider
     */
    public function testCreateList(string $type, $value): void
    {
        $list = new SimpleList($type);
        $list[] = $value;

        $this->assertSame($value, $list[0]);
    }

    public function listDataProvider(): array
    {
        return [
            ['integer', 1],
            ['boolean', true],
            ['double', 2.2],
            ['string', 'valid-value'],
            ['array', []],
            ['object', new \stdClass()],
            [\stdClass::class, new \stdClass()],
        ];
    }

    public function testInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $list = new SimpleList('integer');
        $list[] = 'invalid-value';
    }

    public function testInvalidOffeset(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $list = new SimpleList('integer');
        $list[1] = 1;
    }
}
