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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->morphs("eventable");
            $table->json("title");
            $table->json("desc");
            $table->string('image');
            $table->foreignId("area_id")->constrained();
            $table->enum('status' , ['in Progress' , 'Cancelled' , 'Finished'])->default('in Progress');
            $table->date("start_date");
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->index('eventable_type' , 'eventable_id');
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
        Schema::dropIfExists('events');
    }
};
