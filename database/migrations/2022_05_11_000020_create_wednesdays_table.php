<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWednesdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wednesdays', function (Blueprint $table) {
            $table->id();
            $table->string('content_id');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('start_second')->nullable();
            $table->string('end_second')->nullable();
            $table->string('date_check')->nullable();
            $table->date('selectdata');
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
        Schema::dropIfExists('wednesdays');
    }
}
