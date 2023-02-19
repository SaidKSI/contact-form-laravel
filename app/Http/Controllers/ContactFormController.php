<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

class ContactFormController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function submitContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required',
            'email' => 'required|email',
            'description' => 'required|max:200',
            'document' => 'nullable|mimes:pdf|max:1024'
        ]);

        $requests = new ContactForm();
        $requests->subject = $validatedData['subject'];
        $requests->email = $validatedData['email'];
        $requests->description = $validatedData['description'];

        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $documentName = time() . '_' . $document->getClientOriginalName();
            $document->move(public_path('documents'), $documentName);
            $requests->document = $documentName;
        }

        $requests->save();
        // Config Mail in .env file

        // Mail::to('contact@interaktiondigital.com')
        //     ->send(new ContactFormSubmitted(
        //         $requests->subject,
        //         $requests->email,
        //         $requests->description,
        //         $requests->document,
        //         $requests->created_at
        //     ));
        return redirect('/result')->with('success', 'Your request has been submitted.');
    }
}
