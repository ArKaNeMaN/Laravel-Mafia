<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments__games', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tournament_id');
            $table->foreign('tournament_id')->references('id')->on('tournaments');

            $table->foreignId('game_id');
            $table->foreign('game_id')->references('id')->on('games');

            $table->unique(['tournament_id', 'game_id']);

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
        Schema::dropIfExists('tournaments__games');
    }
}
