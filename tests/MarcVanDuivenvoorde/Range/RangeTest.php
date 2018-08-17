<?php
declare(strict_types=1);

namespace MarcVanDuivenvoorde\Range;


use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    public function setUp()
    {

    }

    /**
     * @param int $number
     * @param int $start
     * @param int $end
     * @param bool $result
     *
     * @dataProvider provideTestIsInRange
     */
    public function testIsInRange(int $number, int $start, int $end, int $step, bool $expected)
    {
        $range = new Range($start, $end, $step);

        $result = $range->isInRange($number);

        $this->assertEquals($expected, $result);
    }

    public function provideTestIsInRange()
    {
        return [
            '1 is in 1 -> 2' => [
                1,
                1,
                2,
                1,
                true,
            ],
            '2 is in 1 -> 2' => [
                2,
                1,
                2,
                1,
                true,
            ],
            '2 is in 1 -> 3' => [
                2,
                1,
                3,
                1,
                true,
            ],
            '1 is not in 2 -> 4' => [
                1,
                2,
                4,
                1,
                false,
            ],
            '2 is not in 1 -> 5 with step of 2' => [
                2,
                1,
                5,
                2,
                false
            ],
            '6 is in 0 -> 12 with step of 3' => [
                6,
                0,
                12,
                3,
                true
            ],
        ];
    }

    /**
     * @param int $number
     * @param int $start
     * @param int $end
     * @param int $step
     * @param bool $expected
     *
     * @dataProvider provideTestIsWithinRange
     */
    public function testIsWithinRange(int $number, int $start, int $end, int $step, bool $expected)
    {
        $range = new Range($start, $end, $step);

        $result = $range->isWithinRange($number);

        $this->assertEquals($expected, $result);
    }

    public function provideTestIsWithinRange() {
        return [
            '1 is in 1 -> 2' => [
                1,
                1,
                2,
                1,
                true,
            ],
            '3 is not in 1 -> 2' => [
                3,
                1,
                2,
                1,
                false,
            ],
            '2 is in 1 -> 5 with step 2' => [
                2,
                1,
                5,
                2,
                true,
            ],
            '6 is not in 1 -> 5 with step 2' => [
                6,
                1,
                5,
                2,
                false,
            ],
        ];
    }
}
