<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    // Method Ini Gasan Mengambil Data Lokasi Dan Mengubah Menjadi Data JSON
    public function getCoordinates()
    {
        $locations = Location::all();

        $coordinates = $locations->map(function ($location) {
            list($latitude, $longitude) = explode(',', $location->coordinates);
            return [
                'id' => $location->id,
                'location_name' => $location->location_name,
                'latitude' => (float) $latitude,
                'longitude' => (float) $longitude,
                'history' => $location->history,
                'image' => $location->image,
            ];
        });
        return response()->json($coordinates);
    }

    public function print()
    {
        return view('locations/location_print', [
            'locations' => Location::all(),
        ]);
    }
    public function index()
    {
        return view('locations/index', [
            'title' => 'Data Lokasi',
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
            'history' => 'required',
            'coordinates' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Location::create([
            'location_name' => $request->location_name,
            'history' => $request->history,
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
        $location = Location::findOrFail($id);
        return view('locations.location_edit', compact('location'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'location_name' => 'required|string',
            'history' => 'required|string|unique:locations,history,' . $id,
            'coordinates' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $location = Location::findOrFail($id);
        $location->location_name = $request->location_name;
        $location->history = $request->history;
        $location->coordinates = $request->coordinates;

        // Update the image only if a new image is provided
        if ($request->image) {
            $location->image = $request->image;
        }

        $location->save();

        return redirect()->route('locations.index')->with('success', 'Lokasi Berhasil Diubah');
    }


    public function destroy(string $id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Lokasi Berhasil Dihapus');
    }
}
