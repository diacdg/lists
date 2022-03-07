<?php

namespace Tests\Util;

use PHPUnit\Framework\TestCase;
use Diacdg\Util\Map;

class MapTest extends TestCase
{
    /**
     * @dataProvider mapDataProvider
     */
    public function testCreateList(string $offsetType, string $valueType, $offset, $value): void
    {
        $list = new Map($offsetType, $valueType);
        $list[$offset] = $value;

        $this->assertSame($value, $list[$offset]);
    }

    public function mapDataProvider(): array
    {
        return [
            ['integer', 'integer', 0, 1],
            ['string', 'integer', 'valid-offset', 1],
            ['string', \stdClass::class, 'valid-offset', new \stdClass()],
        ];
    }

    public function testInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $list = new Map('integer', 'integer');
        $list[1] = 'invalid-value';
    }

    public function testInvalidOffset(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $list = new Map('integer', 'integer');
        $list['invalid-offset'] = 1;
    }
}
