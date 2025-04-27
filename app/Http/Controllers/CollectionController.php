<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\User;
use App\Models\WasteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::with(['user.profile', 'wasteType'])->get();
        log::info("CollectionController index ", [$collections]);
        return view('collections.index', compact('collections'));
    }

    public function create()
    {
        $wasteTypes = WasteType::all();
        $users = User::all();
        return view('collections.create', compact('wasteTypes', 'users'));
    }

    public function store(Request $request)
    {
        log::info("CollectionController store ", [$request->all()]);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'waste_type_id' => 'required|exists:waste_types,id',
            'date_requested' => 'required|date',
            'status' => 'required|string',
            'weight' => 'nullable|numeric',
        ]);

        Collection::create($request->all());
        return redirect()->route('collections.index')->with('success', 'Colección creada exitosamente.');
    }

    public function edit(Collection $collection)
    {
        $wasteTypes = WasteType::all();
        $users = User::all();
        return view('collections.edit', compact('collection', 'wasteTypes', 'users'));
    }

    // Método para actualizar la colección
    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'waste_type_id' => 'required|exists:waste_types,id',
            'date_requested' => 'required|date',
            'status' => 'required|string',
            'weight' => 'nullable|numeric',
        ]);

        $collection->update($request->all());
        return redirect()->route('collections.index')->with('success', 'Colección actualizada exitosamente.');
    }


    public function confirm($id)
    {
        $collection = Collection::findOrFail($id);
        $collection->status = 'Completado';
        $collection->save();

        return redirect()->route('collections.index')->with('success', 'Recolección confirmada exitosamente.');
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();
        return redirect()->route('collections.index')->with('success', 'Colección eliminada exitosamente.');
    }
}
