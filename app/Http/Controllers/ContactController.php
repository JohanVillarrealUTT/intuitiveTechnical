<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use App\Mail\ContactUsMailable;
use App\Models\Contact;
use App\Services\StoreContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(ContactFormRequest $request, StoreContact $contactService)
    {

        $contact = $contactService->store($request->validated());

        return redirect()->route('contactUs.index')
            ->with('info', $contact->approved ? 'Felicidades tu solicitud fue aprovada, revisa tu correo.' : 'Gracias por participar.');
    }
    public function getAllContacts(): View
    {
        $contacts = Contact::latest()->paginate(8);
        return view('dashboard', [
            'contacts' => $contacts,
        ]);
    }
}
