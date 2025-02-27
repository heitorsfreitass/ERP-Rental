<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Client;
use App\Models\Equipment;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::with(['client', 'equipment'])->get();
        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $equipment = Equipment::where('status', 'available')->get();
        return view('contracts.create', compact('clients', 'equipment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'equipment_id' => 'required|exists:equipment,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'required|numeric',
            'status' => 'required|in:active,completed',
        ]);

        // Update equipment status to "rented"
        Equipment::where('id', $request->equipment_id)->update(['status' => 'rented']);

        Contract::create($request->all());
        return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $clients = Client::all();
        $equipment = Equipment::where('status', 'available')->orWhere('id', $contract->equipment_id)->get();
        return view('contracts.edit', compact('contract', 'clients', 'equipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'equipment_id' => 'required|exists:equipment,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'required|numeric',
            'status' => 'required|in:active,completed',
        ]);

        // Update equipment status if changed
        if ($contract->equipment_id != $request->equipment_id) {
            Equipment::where('id', $contract->equipment_id)->update(['status' => 'available']);
            Equipment::where('id', $request->equipment_id)->update(['status' => 'rented']);
        }

        $contract->update($request->all());
        return redirect()->route('contracts.index')->with('success', 'Contract updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        // Update equipment status to "available"
        Equipment::where('id', $contract->equipment_id)->update(['status' => 'available']);
        
        $contract->delete();
        return redirect()->route('contracts.index')->with('success', 'Contract deleted successfully.');
    }
}
