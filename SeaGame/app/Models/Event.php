<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'stadium',
        'location',
        'description',
        'user_id',
    ];
    public static function store($reques, $id = null)
    {
        $events = $reques->only(['name', 'date', 'stadium', 'location', 'description','user_id']);
        $events = self::updateOrCreate(['id' => $id], $events);

        dd(request('name'));
        $teams = request('teams');
        $events->teams()->sync($teams);
        return $events;
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'event_teams')->withTimestamps();
    }
}
