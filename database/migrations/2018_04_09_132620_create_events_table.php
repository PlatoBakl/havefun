<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',250);
            $table->mediumText('description')->nullable();
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('type_id');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('url')->nullable();
            $table->string('ticket_url')->nullable();
            $table->integer('start_cost')->nullable();
            $table->integer('end_cost')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
}
