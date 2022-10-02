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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string("name" , 255);
            $table->string("email" , 100);
            $table->string("password" , 255);
            $table->foreignId("area_id")->constrained();
            $table->string("image" , 255);
            $table->string("phone" , 50);
            $table->string("edu_system" , 100);
            $table->unsignedInteger("views" , false)->default(0);
            $table->string("cv" , 255)->nullable();
            $table->string("status" , 100)->default("deactive");
            $table->unsignedInteger("free_seats" , false);
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
        Schema::dropIfExists('schools');
    }
};
