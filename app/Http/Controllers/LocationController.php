<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::paginate(5);
        return view('locations.locations', ['locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'ciudad' => 'required|max:255',
            'edificio' => 'required|max:255',
            'direccion' => 'required|max:255',
            'sala' => 'required|digits_between:1,3',
        ]);

        $location = new Location();
        $location->ciudad = $request->ciudad;
        $location->edificio = $request->edificio;
        $location->direccion = $request->direccion;
        $location->sala = $request->sala;
        $location->save();

        return redirect()->route('localizaciones.view');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
