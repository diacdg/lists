<?php

namespace Tests\PHPArray;

use PHPUnit\Framework\TestCase;
use Diacdg\PHPArray\ArrayList;

class ArrayListTest extends TestCase
{
    /**
     * @dataProvider listDataProvider
     */
    public function testCreateList(string $type, $value): void
    {
        $list = new ArrayList($type);
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

        $list = new ArrayList('integer');
        $list[] = 'invalid-value';
    }

    public function testExchangeArray(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $list = new ArrayList('string');
        $list->exchangeArray(['invalid-offset'=>1]);
    }

    public function testInvalidOffset(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $list = new ArrayList('integer');
        $list['offset'] = 1;
    }

    public function testRemoveOffset(): void
    {
        $list = new ArrayList('integer');
        $list[] = 1;
        $list[] = 2;
        $list[] = 3;

        $this->assertCount(3, $list);

        unset($list[1]);

        $this->assertCount(2, $list);
    }
}
