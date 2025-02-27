<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceLog;
use App\Models\Equipment;
use Illuminate\Http\Request;

class MaintenanceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenanceLogs = MaintenanceLog::with('equipment')->get();
        return view('maintenance-logs.index', compact('maintenanceLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipment = Equipment::all();
        return view('maintenance-logs.create', compact('equipment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'equipment_id' => 'required|exists:equipment,id',
            'maintenance_date' => 'required|date',
            'description' => 'required',
            'cost' => 'required|numeric',
        ]);

        MaintenanceLog::create($request->all());
        return redirect()->route('maintenance-logs.index')->with('success', 'Maintenance log created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MaintenanceLog $maintenanceLog)
    {
        return view('maintenance-logs.show', compact('maintenanceLog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaintenanceLog $maintenanceLog)
    {
        $equipment = Equipment::all();
        return view('maintenance-logs.edit', compact('maintenanceLog', 'equipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaintenanceLog $maintenanceLog)
    {
        $request->validate([
            'equipment_id' => 'required|exists:equipment,id',
            'maintenance_date' => 'required|date',
            'description' => 'required',
            'cost' => 'required|numeric',
        ]);

        $maintenanceLog->update($request->all());
        return redirect()->route('maintenance-logs.index')->with('success', 'Maintenance log updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaintenanceLog $maintenanceLog)
    {
        $maintenanceLog->delete();
        return redirect()->route('maintenance-logs.index')->with('success', 'Maintenance log deleted successfully.');
    }
}
