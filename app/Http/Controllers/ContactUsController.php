<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
        $contacts = ContactUs::all();
        // return view('contacts.index', compact('contacts'));

        // $contact = ContactUs::all();
        // $selectedPurpose = json_decode($contact->looking_for);
        // $selectedServices = json_decode($contact->services);
        return view("frontend.contact.index", compact("contacts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("frontend.contact.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $selectedPurpose = json_encode($request->looking_for);
        $selectedServices = json_encode($request->services);

        $request->validate([
            "email"=> "required|email",
            "message"=>"required",
        ]);
       

        $contact = new ContactUs;
        $contact->client_name = $request->name;
        $contact->purpose = $selectedPurpose;
        $contact->services = $selectedServices;
        $contact->budget = $request->estimated_budget;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->nda_agreement = $request->nda_agreement;
        $contact->document = $request->document;
        $contact->save();

        $details = [
            'client_name' => $request->name,
            'purpose' => $selectedPurpose,
            'services' => $selectedServices,
            'budget' => $request->estimated_budget,
            'email' => $request->email,
            'message' => $request->message,
            'nda_agreement' => $request->nda_agreement,
            'document' => $request->document,
            // 'document' => storage_path('path/to/your/file.pdf'),
        ];
        
        Mail::to('alphadev315@gmail.com')->send(new ContactUsMail($details));

        return "saved successfully";

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $details = [
            'client_name' => 'John Doe',
            'purpose' => 'General Inquiry',
            'services' => 'Web Development',
            'budget' => '5000',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
            'nda_agreement' => true,
            'document' => null, // This can be a path to a test document if needed
        ];

        return view('email.testmai', ['details' => $details]);
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
