<?php

namespace App\Http\Controllers;

use App\Models\EventTeam;
use Illuminate\Http\Request;

class EventTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventteam = EventTeam:: all();
        return $eventteam;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eventteam = EventTeam::create([
            'event_id' => request('event_id'),
            'team_id' => request('team_id'),
        ]);
        return $eventteam;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eventteam = EventTeam::find($id);
        return $eventteam;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $eventteam = EventTeam::find($id);
        $eventteam->update(
            [
                'event_id' => request('event_id'),
                'event_team' => request('event_team'),
            ]
            );
        return $eventteam;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eventteam = EventTeam::find($id);
        $eventteam->delete();
        return $eventteam;
    }
}
