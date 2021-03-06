<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table){
            $table->increments("id");
            $table->integer("customer_id");
            $table->decimal("order_amount", 10, 2);
            $table->string("order_address", 255)->nullable();
            $table->string("order_phone", 255)->nullable();
            $table->integer("order_status")->default(0);
            $table->integer("payment_status")->default(0);
            $table->integer("payment_method")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
