<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $collections = Collection::with('wasteType')->get();

        $statusCounts = $collections->groupBy('status')->map(function ($items) {
            return $items->count();
        });

        // Agrupar por tipo de residuo
        $summary = $collections->groupBy('waste_type_id')->map(function ($items) {
            $firstItem = $items->first();
            return [
                'total_weight' => $items->sum('weight'),
                'last_updated' => $items->max('updated_at'),
                'color_hex' => $firstItem->wasteType->color_hex ?? '#FFFFFF',
                'name' => $firstItem->wasteType->name ?? 'Desconocido',
            ];
        });

        log::info("DashboardController index ", [$statusCounts]);

        return view('dashboard', compact('summary','statusCounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
