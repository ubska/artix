<?php

namespace App\Http\Controllers;

use App\Models\Intervento;
use App\Models\Client;

use Illuminate\Http\Request;

class IntervetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interventi = Intervento::with('cliente')->get();

        $interventi = Intervento::all();
        return view('interventi.index', compact('interventi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clienti = Client::all();
        return view('interventi.create', compact('clienti'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'descrizione' => 'required|string',
            'data_intervento' => 'required|date',
            'note' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',

        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            $validated['file_path'] = $path;
        }

        Intervento::create($validated);
        return redirect()->route('interventi.index');
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
    public function edit(Intervento $interventi)
    {
        return view('interventi.edit', compact('interventi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intervento $interventi)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'descrizione' => 'required|string',
            'data_intervento' => 'required|date',
            'note' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');
            $validated['file_path'] = $path;
        }


        $interventi->update($validated);

        return redirect()->route('clienti.show', $interventi->client_id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
