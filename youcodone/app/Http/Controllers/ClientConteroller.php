<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ClientConteroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
    }
    public function favori(Request $request)
    {
        $request->validate([
            // 'user_id' => 'required|exists:users,id',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        $client = Client::find(auth()->id());
        $restaurant = Restaurant::find($request->restaurant_id);

        $client->restaurants()->toggle($restaurant->id);
        if ($client->restaurants->contains($restaurant->id)) {
            return redirect()->back()->with('success', 'Restaurant ajouter avec succès.');
        } else {
            return redirect()->back()->with('success', 'Restaurant supprimé avec succès.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
