<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies__series', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('story');
            $table->text('trailer')->nullable();
            $table->text('poster')->nullable();
            $table->text('IMDB_link')->nullable();
            $table->float('rate')->nullable();
            $table->integer('count_view')->nullable();
            $table->date('release_date')->nullable();
            $table->time('runtime')->nullable();
            $table->string('language')->nullable();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('director_id')->unsigned();
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');

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
        Schema::dropIfExists('movies__series');
    }
}
