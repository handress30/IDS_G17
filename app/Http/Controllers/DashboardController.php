<?php

namespace App\Http\Controllers;

use App\Http\Domain\UserProfileValidator;
use App\Models\Collection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        if (empty($startDate) || empty($endDate)) {
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
        } else {
            $startDate = Carbon::parse($startDate)->startOfDay();
            $endDate = Carbon::parse($endDate)->endOfDay();
        }

        $collectionsQuery = Collection::with('wasteType')
            ->whereBetween('date_requested', [$startDate, $endDate]);

        if(UserProfileValidator::isAdminCompany()){
            //$collectionsQuery->where('user_id', UserProfileValidator::getIdUser());
        }else if(UserProfileValidator::isUser()){
            $collectionsQuery->where('user_id', UserProfileValidator::getIdUser());
        }

        $collections = $collectionsQuery->get();

        $statusCounts = $collections->groupBy('status')->map(function ($items) {
            return $items->count();
        });

        $summary = $collections->groupBy('waste_type_id')->map(function ($items) {
            $firstItem = $items->first();
            return [
                'total_weight' => $items->sum('weight'),
                'last_updated' => $items->max('updated_at'),
                'color_hex' => $firstItem->wasteType->color_hex ?? '#FFFFFF',
                'name' => $firstItem->wasteType->name ?? 'Desconocido',
            ];
        });

        log::info("DashboardController index ", [$summary]);

        return view('dashboard', compact('summary','statusCounts', 'startDate', 'endDate'));
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
