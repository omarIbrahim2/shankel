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
            $table->string("field" , 255);
            $table->string("image" , 255)->nullable();
            $table->string('CV' , 255)->nullable();
            $table->string("phone" , 50);
            $table->string('facebook' , 255)->nullable();
            $table->string('twitter' , 255)->nullable();
            $table->string('linkedin' , 255)->nullable();
            $table->unsignedInteger("views" , false)->nullable()->default(0);
            $table->rememberToken();
            $table->index(['name' , 'email' , 'status']);
            $table->boolean("status")->default(false);
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
