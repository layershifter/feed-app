<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    /**
     * @dataProvider flattenProvider
     *
     * @param array $data
     * @param array $expected
     */
    public function testFlatten(array $data, array $expected): void
    {
        $this->assertEquals($expected, array_flatten($data));
    }

    /**
     * @return array
     */
    public function flattenProvider(): array
    {
        return [
            [[[1, 2], [3, 4]], [1, 2, 3, 4]],
            [[[1, 2], [3, [4, 5]]], [1, 2, 3, 4, 5]],
        ];
    }
}
