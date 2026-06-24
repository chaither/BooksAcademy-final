<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'inquiry_type' => 'required|string',
            'message' => 'required|string',
        ]);

        // Send email to your Gmail address
        // The address it sends TO should be configured via the .env (e.g., MAIL_FROM_ADDRESS or a specific contact email)
        // Here we can use config('mail.from.address') or a hardcoded email, let's use config('mail.from.address')
        $toEmail = config('mail.from.address', 'contact@booksacademy.com');

        Mail::to($toEmail)->send(new ContactMail($validated));

        return redirect()->back()->with('success', 'Your message has been sent successfully! We will reach out to you within 24 hours.');
    }
}
