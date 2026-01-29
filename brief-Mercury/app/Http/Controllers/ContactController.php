<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index(){
        $contacts = Contact::all();
        return view('contacts.index' ,compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $groups = Group::all();
        return view('contacts.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validated = $request->validate([
            'nom'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:10|min:10',
            'group_id' => 'nullable|exists:groups,id'
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $contact = Contact::findOrFail($id);
        $groups = Group::all();
        return view('contacts.edit' , compact('contact','groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $validated = $request->validate([
            'nom'  => 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'phone'=> 'required|string|max:10|min:10',
            'group_id' => 'nullable|exists:groups,id'
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validated);       

        return redirect()->route('contacts.index')->with('success', 'Contact modifié avec succsess');
    }
    
    /**
     * Remove the specified resource from storage.
    */
    public function destroy(string $id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact supprimé avec succsess');
    }
}
