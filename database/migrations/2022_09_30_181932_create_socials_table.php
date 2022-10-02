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
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string("facebook" , 100)->nullable();
            $table->string("Linkedin" , 100)->nullable();
            $table->string("instagram" , 100)->nullable();
            $table->string("twitter" , 100)->nullable();
            $table->string("email" , 100);
            $table->string("phone" , 100);
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
        Schema::dropIfExists('socials');
    }
};
