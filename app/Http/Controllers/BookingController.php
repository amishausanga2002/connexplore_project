<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Sport;
use App\Models\Equipment;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'sport', 'equipment', 'location'])->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch only equipment that is not marked as 'damaged'
        $equipment = Equipment::whereNotIn('availability_status', ['damaged', 'not available'])->get();
        $sports = Sport::all(); // Assuming you also need a list of sports
        $locations = Location::all(); // Assuming you also need a list of locations

        return view('bookings.create', [
            'equipment' => $equipment,
            'sports' => $sports,
            'locations' => $locations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'cbnumber' => 'required|string|max:255',
        'sport_id' => 'required|exists:sports,id',
        'equipment_id' => 'required|exists:equipment,id',
        'location_id' => 'required|exists:locations,id',
        'date' => 'required|date',
        'time_slot' => 'required|string'
    ]);

    if (Booking::where('time_slot', $request->time_slot)
                ->where('location_id', $request->location_id)
                ->where('equipment_id', $request->equipment_id)
                ->where('date', $request->date)
                ->exists()) {
        return redirect()->back()
            ->withErrors(['time_slot' => 'This equipment is already booked for the selected time slot at this location on the specified date. Please choose another.'])
            ->withInput();
    }

    $user = Auth::user();
    $sport = Sport::find($request->sport_id);
    $equipment = Equipment::find($request->equipment_id);
    $location = Location::find($request->location_id);

    if (!$location) {
        return back()->withErrors(['location_id' => 'Invalid location selected.'])->withInput();
    }

    Booking::create([
        'user_id' => $user->id,
        'user_name' => $user->name ?? $user->email,
        'cbnumber' => $request->cbnumber,
        'sport_id' => $sport->id,
        'sport_name' => $sport->name,
        'equipment_id' => $equipment->id,
        'equipment_name' => $equipment->name,
        'location_id' => $location->id,
        'location_name' => $location->branch,
        'date' => $request->date,
        'time_slot' => $request->time_slot
    ]);

    return redirect()->route('users.sports-page')->with('success', 'Booking created successfully.');
}






    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $sports = Sport::all();
        $equipment = Equipment::all();
        $locations = Location::all();
        return view('bookings.edit', compact('booking', 'sports', 'equipment', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cbnumber' => 'required|string|max:255',
            'sport_id' => 'required',
            'equipment_id' => 'required',
            'location_id' => 'required',
            'date' => 'required|date',
            'time_slot' => 'required|string'
        ]);

        $booking = Booking::findOrFail($id);

        $user = Auth::user();
        $sport = Sport::find($request->sport_id);
        $equipment = Equipment::find($request->equipment_id);
        $location = Location::find($request->location_id);

        $booking->update([
            'user_id' => $user->id,
            'user_name' => $user->name ?? $user->email,
            'cbnumber' => $request->cbnumber,
            'sport_id' => $sport->id,
            'sport_name' => $sport->name,
            'equipment_id' => $equipment->id,
            'equipment_name' => $equipment->name,
            'location_id' => $location->id,
            'location_name' => $location->name,
            'date' => $request->date,
            'time_slot' => $request->time_slot
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }

    public function myBookings()
{
    $userId = Auth::id();

    $bookings = Booking::where('user_id', $userId)->get();

    return view('bookings.my-bookings', compact('bookings'));
}
}
