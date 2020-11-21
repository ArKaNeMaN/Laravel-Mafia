<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->foreignId('day_id');
            $table->foreign('day_id')->references('id')->on('days');

            $table->foreignId('leader_id');
            $table->foreign('leader_id')->references('id')->on('players');

            $table->foreignId('best_red_id')->nullable();
            $table->foreign('best_red_id')->references('id')->on('players');

            $table->foreignId('best_black_id')->nullable();
            $table->foreign('best_black_id')->references('id')->on('players');

            $table->enum('result', [App\Models\Game::RESULTS]);

            $table->string('description', 256)->default('');

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
        Schema::dropIfExists('games');
    }
}
