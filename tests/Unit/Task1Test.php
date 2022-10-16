<?php

namespace Tests\Unit;

use App\Tasks\Task1\Test;
use PHPUnit\Framework\TestCase;

class Task1Test extends TestCase
{
    public function test_simple_list()
    {
        $a = new Test();
        $b = new Test();
        $c = new Test();

        $a->next = $b;
        $b->next = $c;

        $reversed = reverse($a);

        $this->assertEquals($c, $reversed);
        $this->assertEquals($b, $reversed->next);
        $this->assertEquals($a, $reversed->next->next);
        $this->assertNull($reversed->next->next->next);
    }

    public function test_one_element_sequence()
    {
        $a = new Test();

        $reversed = reverse($a);

        $this->assertEquals($a, $reversed);
        $this->assertNull($reversed->next);
    }

    public function test_double_reverse()
    {
        $a = new Test();
        $b = new Test();
        $c = new Test();

        $a->next = $b;
        $b->next = $c;

        $reversed = reverse(reverse($a));
        $this->assertEquals($a, $reversed);
    }

    public function test_recursion()
    {
        $a = new Test();
        $b = new Test();
        $c = new Test();


        $a->next = $b;
        $b->next = $c;
        $c->next = $a;

        $reversed = reverse(reverse($a));

        $this->assertEquals($a, $reversed);
    }
}
