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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->json("name" );
            $table->string("email" , 100 );
            $table->string("password" , 255);
            $table->string("image" , 255)->nullable();
            $table->boolean("status")->default(false);
            $table->foreignId("area_id")->constrained();
            $table->json("type");
            $table->json("orgName");
            $table->unsignedInteger("notifications")->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->index(['email' , 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
};
