<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId("transaction_id")->constrained();
            $table->foreignId("service_id")->constrained();
            $table->integer('service_order_quantity' , false , true);
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
        Schema::dropIfExists('transactions_services');
    }
};
