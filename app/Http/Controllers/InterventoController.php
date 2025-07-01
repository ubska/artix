<?php

namespace App\Http\Controllers;


use App\Models\Intervento;
use App\Models\Client;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InterventoController extends Controller
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
            'signature' => 'nullable|string',


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
        $intervento = Intervento::with('cliente')->findOrFail($id);
        return view('clienti.show', compact('clienti'));
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
            'signature' => 'nullable|string',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            $validated['file_path'] = $path;
        }


        $interventi->update($validated);

        return redirect()->route('clienti.show', $interventi->client_id);
    }

    // ✅ Mostra il form per creare Cliente + Intervento insieme
    public function createWithClient()
    {
        return view('interventi.create_with_client');
    }

    // ✅ Salva cliente e intervento insieme
    public function storeWithClient(Request $request)
    {


        $validated = $request->validate([
            // Dati cliente
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string',

            // Dati intervento
            'descrizione' => 'required|string',
            'data_intervento' => 'required|date',
            'note' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            // 'signature' => 'nullable|string',

        ]);
        dd($request->all());

        // Crea il cliente
        $cliente = Client::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
            'address' => $validated['address'] ?? null,
        ]);

        // Gestione file
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads');
        }

        // Crea l’intervento legato al cliente
        Intervento::create([
            'client_id' => $cliente->id,
            'descrizione' => $validated['descrizione'],
            'data_intervento' => $validated['data_intervento'],
            'note' => $validated['note'] ?? null,
            'file_path' => $filePath,
            'signature' => $validated['signature'] ?? null,
        ]);



        return redirect()->route('dashboard')->with('success', 'Cliente e intervento salvati con successo!');
    }

    public function downloadPdf($id)
    {
        $intervento = Intervento::with('cliente')->findOrFail($id);

        $pdf = PDF::loadView('interventi.pdf', compact('intervento'));

        $filename = 'intervento_' . $intervento->id . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
