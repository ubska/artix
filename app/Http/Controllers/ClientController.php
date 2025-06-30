<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clienti = Client::all();
        return view('clienti.index', compact('clienti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clienti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:50',
        ]);
        Client::create($request->all());
        return view('clienti.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $clienti)
    {
        $clienti->load('interventi');
        return view('clienti.show', compact('clienti'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $clienti)
    {
        return view('clienti.edit', compact('clienti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $clienti)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|integer|max:9999999999',
            'email' => 'required|email|max:255',
        ]);

        $clienti->update($request->all());

        return redirect()->route('clienti.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clienti = Client::findOrFail($id);
        $clienti->delete();
        return redirect()->route('clienti.index');
    }
}
