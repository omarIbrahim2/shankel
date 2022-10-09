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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->foreignId("parentt_id")->constrained();
            $table->foreignId("school_id")->nullable()->constrained();
            $table->foreignId("grade_id")->constrained();
            $table->string("name" , 255);
            $table->unsignedInteger("age" , false);
            $table->string("gender" , 50);
            $table->string("birth_date" , 100);
            $table->string("image" , 255)->nullable();
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
        Schema::dropIfExists('children');
    }
};
