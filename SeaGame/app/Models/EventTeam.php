<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'event_id',
        'team_id',
    ];

    public function teams(){
        return $this->hasMany(Team::class);
    }
    public function events(){
        return $this->hasMany(Event::class);
    }
}
