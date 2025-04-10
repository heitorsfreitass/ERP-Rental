<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Equipment;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function equipmentStats()
    {
        $available = Equipment::where('status', 'available')->count();
        $rented = Equipment::where('status', 'rented')->count();
        $underMaintenance = Equipment::where('status', 'under_maintenance')->count();

        return response()->json([
            'labels' => ['Available', 'Rented', 'Under Maintenance'],
            'data' => [$available, $rented, $underMaintenance],
        ]);
    }

    public function financialStats()
    {
        $profitMargins = Equipment::with('contracts')->get()->map(function ($equipment) {
            $revenue = $equipment->contracts->sum('total_cost');
            $cost = $equipment->maintenanceLogs->sum('cost');
            $profitMargin = ($revenue - $cost) / ($revenue ?: 1) * 100; 
            return [
                'label' => $equipment->name,
                'profitMargin' => round($profitMargin, 2),
            ];
        });

        $outstandingPayments = Contract::where('status', 'active')
            ->with('client')
            ->get()
            ->groupBy('client.name')
            ->map(function ($contracts, $clientName) {
                return [
                    'label' => $clientName,
                    'outstandingAmount' => $contracts->sum('total_cost') - $contracts->sum('paid_amount'),
                ];
            });

        return response()->json([
            'profitMargins' => $profitMargins->values(),
            'outstandingPayments' => $outstandingPayments->values(),
        ]);
    }
}
