<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesVotingsVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games__votings__votes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('voting_id');
            $table->foreign('voting_id', 'for-vt-id')->references('id')->on('games__votings');

            $table->foreignId('game_player_id');
            $table->foreign('game_player_id', 'for-gpl-id')->references('id')->on('games__players');

            $table->foreignId('voted_id')->nullable();
            $table->foreign('voted_id')->references('id')->on('games__votings__players');

            $table->enum('for', App\Models\GameVotingVote::VOTE_FOR)->default('default');

            $table->unique(['voting_id', 'game_player_id', 'for'], 'uniq-pl-vt');

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
        Schema::dropIfExists('games__votings__votes');
    }
}
