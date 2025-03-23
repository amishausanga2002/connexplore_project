<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Location;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    public function index()
    {
        // Eager load the location and sport data
        $equipments = Equipment::with('location', 'sport')->get();
        return view('equipments.index', compact('equipments'));
    }

    public function create()
    {
        // Fetch all locations and sports from the database
        $locations = Location::all();
        $sports = Sport::all();

        return view('equipments.create', [
            'locations' => $locations,
            'sports' => $sports
        ]);
    }




    public function store(Request $request)
    {
        // Validate the incoming request data including sport_id and availability_status
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'location_id' => 'required|exists:locations,id',
            'sport_id' => 'required|exists:sports,id',
            'availability_status' => 'required|string',
            'quantity' => 'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Create a new equipment record
        Equipment::create($data);

        // Redirect to the equipment list page with success message
        return redirect()->route('equipments.index')->with('success', 'Equipment successfully created!');
    }

    public function edit(Equipment $equipment)
    {
        // Fetch all locations and sports from the database
        $locations = Location::all();
        $sports = Sport::all();

        return view('equipments.edit', [
            'equipment' => $equipment,
            'locations' => $locations,
            'sports' => $sports
        ]);
    }

    public function update(Request $request, Equipment $equipment)
    {
        // Validate the incoming request data including sport_id and availability_status
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'location_id' => 'required|exists:locations,id',
            'sport_id' => 'required|exists:sports,id',
            'availability_status' => 'required|string',
            'quantity' => 'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Check and handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($equipment->image) {
                Storage::delete('public/' . $equipment->image);
            }
            // Store new image and update the data array
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Update the equipment record with new data
        $equipment->update($data);

        // Redirect to the equipment list page with success message
        return redirect()->route('equipments.index')->with('success', 'Equipment successfully updated!');
    }

    public function destroy(Equipment $equipment)
    {
        // Delete the equipment record
        if ($equipment->image) {
            Storage::delete('public/' . $equipment->image);
        }
        $equipment->delete();

        // Redirect to the equipment list page with success message
        return redirect()->route('equipments.index')->with('success', 'Equipment successfully deleted!');
    }



}
