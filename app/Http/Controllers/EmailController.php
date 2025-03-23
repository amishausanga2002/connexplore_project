<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovedEmail;

class EmailController extends Controller
{
    public function index()
    {
        // Retrieve all approved emails from the database
        $emails = ApprovedEmail::all();

        // Pass the emails to the view
        return view('emails.index', ['emails' => $emails]);
    }

    public function create()
    {
        // Return the view to create a new email
        return view('emails.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email|unique:approved_emails,email',
        ]);

        // Create the email in the database
        ApprovedEmail::create(['email' => $request->email]);

        // Redirect to the index route with a success message
        return redirect()->route('emails.index')->with('success', 'Email added successfully!');
    }

    public function destroy($id)
    {
        // Find the email by ID and delete it
        $email = ApprovedEmail::findOrFail($id);
        $email->delete();

        // Redirect back to the emails index with a success message
        return redirect()->route('emails.index')->with('success', 'Email deleted successfully!');
    }
}
