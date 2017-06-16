<?php

namespace App\Tests\Utils;

use App\Messages\MessageInterface;
use App\Utils\CompareMessageDates;
use DateTime;
use PHPUnit\Framework\TestCase;

class CompareMessageDatesTest extends TestCase
{
    /**
     * @dataProvider invokeProvider
     *
     * @param \DateTime $a
     * @param \DateTime $b
     * @param int       $expected
     */
    public function testInvoke(DateTime $a, DateTime $b, int $expected): void
    {
        $result = (new CompareMessageDates())($this->mock($a), $this->mock($b));

        $this->assertInternalType('int', $result);
        $this->assertEquals($expected, $result);
    }

    /**
     * @return array
     */
    public function invokeProvider(): array
    {
        return [
            [new DateTime('2017-01-01'), new DateTime('2017-01-01'), 0],
            [new DateTime('2017-01-02'), new DateTime('2017-01-01'), -1],
            [new DateTime('2017-01-01'), new DateTime('2017-01-02'), 1],
        ];
    }

    /**
     * @param \DateTime $date
     *
     * @return \App\Messages\MessageInterface
     */
    private function mock(DateTime $date): MessageInterface
    {
        $stub = $this->createMock(MessageInterface::class);
        $stub->method('date')->willReturn($date);

        /* @var MessageInterface $stub */
        return $stub;
    }
}
