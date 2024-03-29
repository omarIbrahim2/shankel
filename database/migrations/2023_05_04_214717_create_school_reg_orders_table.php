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
        Schema::create('school_reg_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->foreignId('school_id')->constrained();
            $table->foreignId("parentt_id")->constrained();
            $table->foreignId('child_id');
            $table->foreignId('grade_id');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('school_reg_orders');
    }
};
