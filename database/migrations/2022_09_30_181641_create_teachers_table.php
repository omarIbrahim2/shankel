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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string("name" , 255);
            $table->string("email" , 100);
            $table->string("password" , 255);
            $table->foreignId("area_id")->constrained();
            $table->string("image" , 255)->nullable();
            $table->string("phone" , 50);
            $table->unsignedInteger("views" , false)->default(0);
            $table->string("status" , 100)->default("deactive");
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
        Schema::dropIfExists('teachers');
    }
};
