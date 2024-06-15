<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index()
    {
        return view('locations/index', [
            'title' => 'Data Penanda',
            'locations' => Location::all(),
        ]);
    }

    public function create()
    {
        return view('locations.location_create');
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('location-images', 'public');

        $request->validate([
            'location_name' => 'required',
            'description' => 'required',
            'coordinates' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Location::create([
            'location_name' => $request->location_name,
            'description' => $request->description,
            'coordinates' => $request->coordinates,
            'image' => $path,
        ]);
        return redirect()->route('locations.index')->with('success', 'Lokasi Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        Location::findOrFail($id);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Lokasi Berhasil Dihapus');
    }
}
