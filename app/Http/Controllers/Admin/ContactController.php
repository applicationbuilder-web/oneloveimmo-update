<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Liste des messages.
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Afficher un message.
     */
    public function show(Contact $contact)
    {
        if (!$contact->is_read) {

            $contact->update([
                'is_read' => true
            ]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Supprimer un message.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Le message a été supprimé avec succès.');
    }
}