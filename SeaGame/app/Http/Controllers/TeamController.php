<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return response()->json(['success' =>true, 'data' => $teams],200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teams = Team::create(
            [
                'name' => request('name'),
                'country' => request('country'),
                'member' => request('member'),
                'user_id' => request('user_id'),
            ]
        );
    return response()->json(['success' =>true, 'data' => $teams],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teams = Team::find($id);
        $teams = new TeamResource($teams);
        return response()->json(['success' =>true, 'data' => $teams],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teams = Team::find($id);
        $teams->update(
            [
                "name" => request("name"),
                "country" => request("country"),
                "member" => request("member"),
            ]
            );
        return response()->json(['success' =>true, 'data' => $teams], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teams = Team::find($id);
        $teams->delete();
        return response()->json(['success' =>true, 'message'=>'delete successfully'], 200);
    }
}
