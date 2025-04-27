<?php

namespace App\Http\Controllers;

use App\Models\ThirdParty;
use App\Models\Domain;
use Illuminate\Http\Request;

class ThirdPartyController extends Controller
{
    public function index()
    {
        $thirdParties = ThirdParty::whereHas('domainType', function ($q) {
            $q->where('domain', 'EmpresaRecolectora');
        })->get();

        return view('collection_companies.index', compact('thirdParties'));
    }

    public function create()
    {
        return view('collection_companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'identification' => 'required|unique:third_parties,identification',
        ]);

        ThirdParty::create([
            'name' => $request->name,
            'identification' => $request->identification,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'id_domain_type' => Domain::where('domain', 'EmpresaRecolectora')->first()->id,
        ]);

        return redirect()->route('collection_companies.index')->with('success', 'Empresa creada exitosamente.');
    }

    public function edit(ThirdParty $collection_company)
    {
        return view('collection_companies.edit', ['thirdParty' => $collection_company]);
    }


    public function update(Request $request, ThirdParty $thirdParty)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'regex:/^[\w\.-]+@[\w\.-]+\.(com|co)$/'],
            'identification' => 'required|unique:third_parties,identification,' . $thirdParty->id,
        ]);

        $thirdParty->update($request->all());

        return redirect()->route('collection_companies.index')->with('success', 'Empresa actualizada exitosamente.');
    }

    public function destroy(ThirdParty $thirdParty)
    {
        $thirdParty->delete();

        return redirect()->route('collection_companies.index')->with('success', 'Empresa eliminada exitosamente.');
    }
}
