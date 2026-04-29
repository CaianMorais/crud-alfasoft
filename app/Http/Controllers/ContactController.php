<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        # o formrequest vai validar os dados (de acordo com as regras do eniunciado)
        Contact::create($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, $id) 
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Contato atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        # registro continua em banco, apenas alimenta a coluna deleted_at, indicador de que o contato foi excluido
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contato removido.');
    }
}
