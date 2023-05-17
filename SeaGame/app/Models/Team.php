<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
        'member',
        'user_id'
    ];


    public static function store($reques, $id = null)
    {
        $teams = $reques->only(['name', 'country', 'member','user_id']);
        $teams = self::updateOrCreate(['id' => $id], $teams);
        return $teams;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function events(){
        return $this->belongsToMany(Event::class, 'event_teams')->withTimestamps();
    }

}
