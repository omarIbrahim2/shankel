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
            $table->string("image" , 255)->nullable();
            $table->string("phone" , 50);
            $table->text('desc')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->string('facebook' , 255)->nullable();
            $table->string('twitter' , 255)->nullable();
            $table->string('linkedin' , 255)->nullable();
            
            $table->foreignId("edu_systems_id")->constrained();
            $table->date("establish_date");
            $table->enum('type' , ['Center' , 'School']);
            $table->unsignedInteger("views" , false)->default(0);
            $table->boolean("status")->default(false);
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
