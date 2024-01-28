<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToolCategory;
use App\Models\Contact;


class HomeController extends Controller
{
    public function index()
    {
        $toolCategories = ToolCategory::all();
        return view('pages.home', compact('toolCategories'));
      
    }

    public function privacy_policy()
    {
        return view('pages.privacy_policy');
    }

    public function terms_of_service()
    {
        return view('pages.terms_of_service');
    }

    
    public function contact_form(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $dataToInsert = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
        // Log the data for debugging
 

    // Insert data into the database
    Contact::create($dataToInsert);

    return response()->json(['message' => 'Your message has been sent. Thank you!']);

    }
}
