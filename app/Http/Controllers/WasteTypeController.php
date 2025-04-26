<?php

namespace App\Http\Controllers;

use App\Models\WasteType;
use Illuminate\Http\Request;

class WasteTypeController extends Controller
{
    public function index()
    {
        $wasteTypes = WasteType::all();
        return view('waste_types.index', compact('wasteTypes'));
    }

    public function create()
    {
        return view('waste_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        WasteType::create($request->only(['name', 'color_hex']));

        return redirect()->route('waste-types.index')->with('success', 'Tipo de residuo creado exitosamente.');
    }

    public function show(WasteType $wasteType)
    {
        return view('waste_types.show', compact('wasteType'));
    }

    public function edit(WasteType $wasteType)
    {
        return view('waste_types.edit', compact('wasteType'));
    }

    public function update(Request $request, WasteType $wasteType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $wasteType->update($request->only(['name', 'color_hex']));

        return redirect()->route('waste-types.index')->with('success', 'Tipo de residuo actualizado exitosamente.');
    }

    public function destroy(WasteType $wasteType)
    {
        $wasteType->delete();

        return redirect()->route('waste-types.index')->with('success', 'Tipo de residuo eliminado exitosamente.');
    }
}
