<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Equipment;
use App\Models\Contract;
use App\Models\MaintenanceLog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalClients = Client::count();
        $totalEquipment = Equipment::count();
        $activeContracts = Contract::where('status', 'active')->count();
        $pendingMaintenance = MaintenanceLog::where('maintenance_date', '>=', now())->count();

        // Pass the data to the view
        return view('home', compact('totalClients', 'totalEquipment', 'activeContracts', 'pendingMaintenance'));
    }
}
