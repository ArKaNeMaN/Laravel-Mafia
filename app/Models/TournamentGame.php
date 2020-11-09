<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentGame extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tournaments__games';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function tournament()
    {
        return $this->belongsTo('App\Models\Tournament', 'tournament_id');
    }

    public function game()
    {
        return $this->belongsTo('App\Models\Game', 'game_id');
    }
}
