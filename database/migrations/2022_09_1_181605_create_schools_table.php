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
            $table->json("name");
            $table->string("email" , 100);
            $table->string("password" , 255);
            $table->foreignId("area_id")->constrained();
            $table->string("image" , 255)->nullable();
            $table->string("phone" , 50);
            $table->json('desc')->nullable();
            $table->json('mission')->nullable();
            $table->json('vision')->nullable();
            $table->string('facebook' , 255)->nullable();
            $table->string('twitter' , 255)->nullable();
            $table->string('linkedin' , 255)->nullable();
            $table->foreignId("edu_systems_id")->constrained();
            $table->date("establish_date");
            $table->enum('type' , ['Center' , 'School' , 'KG']);
            $table->unsignedInteger("views" , false)->default(0);
            $table->boolean("status")->default(false);
            $table->unsignedInteger("free_seats" , false);
            $table->rememberToken();
            $table->unsignedInteger("notifications")->default(0);
            $table->index([ 'email' , 'status' , 'edu_systems_id' , 'area_id' , 'type']);
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
