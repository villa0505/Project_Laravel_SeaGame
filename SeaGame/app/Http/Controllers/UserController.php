<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['success' =>true, 'data' => $users],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users = User::create(
            [
                "name" => request("name"),
                "email" => request("email"),
                "password" => request("password"),  
            ]
            );
            return response()->json(['success' =>true, 'data' => $users],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        return response()->json(['success' =>true, 'data' => $users],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::find($id);
        $users->update(
            [
                "name" => request("name"),
                "email" => request("email"),
                "password" => request("password"),
            ]
            );
        return response()->json(['success' =>true, 'data' => $users], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();
        return response()->json(['success' =>true, 'message'=>'delete successfully'], 200);
    }
}

