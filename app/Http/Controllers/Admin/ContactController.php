<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('messages'));
    }

    public function show(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Message supprimé.');
    }

    public function archive(Contact $contact)
    {
        $contact->update(['is_archived' => true]);
        return back()->with('success', 'Message archivé.');
    }
}
