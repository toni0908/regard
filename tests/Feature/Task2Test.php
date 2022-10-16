<?php

namespace Tests\Feature;


use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\CreatesApplication;
use Tests\TestCase;

class Task2Test extends TestCase
{

    use CreatesApplication,RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Order::factory(150)->create();
    }

    public function test_get_first_orders_use_relation()
    {
        //Если бы устроило 2 запроса в бд, то делал бы так
        DB::connection()->enableQueryLog();
        $orders = Order::query()->limit(50)->with(['manager'])->get();

        $this->assertEquals(50,count($orders));

        $this->assertEquals(2,count(DB::getQueryLog()));
    }

    public function test_get_first_orders_raw_sql()
    {
        //Если нужно за 1 запрос то вот так.
        DB::connection()->enableQueryLog();
        $orders = Order::getWithManagerFullName(50);

        $this->assertEquals(50,count($orders));
        $this->assertObjectHasAttribute('fullname',$orders[0]);
        $this->assertObjectHasAttribute('id',$orders[0]);
        $this->assertEquals(1,count(DB::getQueryLog()));
    }
}
