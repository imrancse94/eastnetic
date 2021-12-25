<?php

namespace Tests\Unit;

use App\Services\OrderService;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $order = new OrderService();
        $order_id = 5;
        $user_id = 2;
        $user_type = 2;
        $response = $order->getOrderByIdWithUserId($order_id,$user_id,$user_type);
        $this->assertStatus($response);
    }
}
