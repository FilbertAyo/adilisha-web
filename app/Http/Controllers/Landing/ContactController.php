<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index(): View
    {
        return view('landing.about.contact');
    }

    /**
     * Handle contact form submission.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        try {
            // Send email to info@adilisha.or.tz
            Mail::to(config('mail.from.address'))
                ->send(new ContactMail($validated));

            return redirect()
                ->route('contact')
                ->with('success', 'Thank you for contacting us! We will get back to you soon.');
        } catch (\Exception $e) {
            return redirect()
                ->route('contact')
                ->with('error', 'Sorry, there was an error sending your message. Please try again later.')
                ->withInput();
        }
    }
}
