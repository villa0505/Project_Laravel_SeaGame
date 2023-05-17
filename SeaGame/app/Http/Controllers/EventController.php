<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        // $events = EventResource::all();
        $name = request('name');
        $events = Event:: where('name', 'like', '%'.$name.'%')->get();
        return response()->json(['success' =>true, 'data' => $events ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $events = Event::create([
            "name" => request("name"),
            "date" => request("date"),
            "stadium" => request("stadium"),
            "location" => request("location"),
            "description" => request("description"),
            "user_id" => request("user_id"),
        ]);

        $teams = request('teams');
        $events->teams()->sync($teams);

        return response()->json(['success' =>true, 'data' => $events],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = Event::find($id);
        $events = new EventResource($events);
        return response()->json(['success' =>true, 'data' => $events],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $events = Event::find($id);
            $events->update(
                [
                    "name" => request("name"),
                    "date" => request("date"),
                    "stadium" => request("stadium"),
                    "location" => request("location"),
                    "description" => request("description"),  
                ]
                );
            return response()->json(['success' =>true, 'data' => $events], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $events = Event::find($id);
        $events->delete();
        return response()->json(['success' =>true, 'message'=>'delete successfully'], 200);
    }
}
