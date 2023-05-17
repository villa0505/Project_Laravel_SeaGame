<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return response()->json(['success' =>true, 'data' => $tickets],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tickets = Ticket::create([
            'date' => request('date'),
            'price' => request('price'),
            'user_id' => request('user_id'),
            'event_id' => request('event_id')
        ]);
        return response()->json(['success' =>true, 'data' => $tickets],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tickets = Ticket::find($id);
        $tickets = new TicketResource($tickets);
        return response()->json(['success' =>true, 'data' => $tickets],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tickets = Ticket::find($id);
        $tickets->update(
            [
                "date" => request("date"),
                "price" => request("price"),
            ]
            );
        return response()->json(['success' =>true, 'data' => $tickets], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tickets = Ticket::find($id);
        $tickets->delete();
        return response()->json(['success' =>true, 'message'=>'delete successfully'], 200);
    }
}
