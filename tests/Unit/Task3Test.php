<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class Task3Test extends TestCase
{
    public function test_wrong_weight_of_box()
    {
        $boxes = [1, 2, 1, 5, "Пять кг", 3, 5, 2, 5, 5];
        $weight = 6;

        $this->expectException(\Exception::class);
        getResult($boxes, $weight);
    }

    public function test_first_example()
    {
        $boxes = [1, 2, 1, 5, 1, 3, 5, 2, 5, 5];
        $weight = 6;

        $this->assertEquals(3,getResult($boxes, $weight));
    }

    public function test_second_example()
    {
        $boxes = [2,4,3,6,1];
        $weight = 5;

        $this->assertEquals(2,getResult($boxes, $weight));
    }

    public function test_all_heavier()
    {
        $boxes = [4,5,6,3,7,9,6,4,8,9,4];
        $weight = 6;

        $this->assertEquals(0,getResult($boxes, $weight));
    }

    public function test_all_lighter()
    {
        $boxes = [4,5,6,3,7,9,6,4,8,9,4];
        $weight = 19;

        $this->assertEquals(0,getResult($boxes, $weight));
    }

    public function test_assoc_aaray()
    {
        $boxes = ['k' => 2,'m' => 4,3,3 => 6,1];
        $weight = 5;

        $this->assertEquals(2,getResult($boxes, $weight));
    }

}
