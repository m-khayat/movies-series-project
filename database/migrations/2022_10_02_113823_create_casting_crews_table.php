<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastingCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casting_crews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('movie__series_id')->unsigned();
            $table->foreign('movie__series_id')->references('id')->on('movies__series')->onDelete('cascade');

            $table->bigInteger('actor_id')->unsigned();
            $table->foreign('actor_id')->references('id')->on('actors')->onDelete('cascade');
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
        Schema::dropIfExists('casting_crews');
    }
}
