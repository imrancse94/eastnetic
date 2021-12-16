<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('unique_order_id',50);
            $table->integer('qty')->default(0);
            $table->decimal('unit_price')->default(0);
            
            //1 = Approved, 2 = Rejected, 3 = Processing, 4 = Shipped, 5 = Delivered
            $table->tinyInteger('order_status')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
