<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'players';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getLatestGame()
    {
        return $this->gamesPlayers()->latest()->first()->game()->first();
    }

    public function gamesPlayers()
    {
        return $this->hasMany(\App\Models\GamePlayer::class, 'player_id');
    }

    public function games()
    {
        $gamesPlayers = $this->gamesPlayers()->get();
        $games = [];
        foreach($gamesPlayers as $v)
            $games[] = $v->game()->first();
        return $games;
    }
}
