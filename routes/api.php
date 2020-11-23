<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Player;
use App\Models\Day;
use App\Models\Tournament;
use App\Models\Game;
use App\Models\GamePlayer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Player

Route::get('/player/{player}', function (Player $player) {
    return response()->json($player, 200);
});

Route::get('/player/{player}/latest-game', function (Player $player) {
    return response()->json($player->getLatestGame(), 200);
});

Route::get('/player/{player}/games', function (Player $player) {
    return response()->json($player->games(), 200);
});


// Game

Route::get('/game/{game}', function (Game $game) {
    return response()->json($game, 200);
});

Route::get('/game/{game}/players', function (Game $game) {
    return response()->json($game->players, 200);
});

Route::get('/game/{game}/player/{ingame_id}', function (Game $game, $ingame_id) {
    return response()->json($game->players->where('ingame_player_id', $ingame_id)->first(), 200);
});

Route::get('/game/{game}/votings', function (Game $game) {
    return response()->json($game->votings, 200);
});

Route::get('/game/{game}/voting/{ingame_id}', function (Game $game, $ingame_id) {
    return response()->json($game->votings->where('ingame_id', $ingame_id)->first(), 200);
});

Route::get('/game/player/{gamePlayer}', function (GamePlayer $gamePlayer) {
    return response()->json($gamePlayer, 200);
});

// Day

Route::get('/day/{day}', function (Day $day) {
    return response()->json($day, 200);
});

// Tournament

Route::get('/tournament/{tournament}', function (Tournament $tournament) {
    return response()->json($tournament, 200);
});
