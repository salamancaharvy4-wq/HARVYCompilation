<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaintenanceRequest;
use App\Models\Machine;
use App\Models\MaintenanceLog;
use App\Services\MachineService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MaintenanceController extends Controller
{
    public function index(): View
    {
        return view('maintenance.index', ['logs' => MaintenanceLog::with('machine', 'reporter')->latest()->get(), 'machines' => Machine::orderBy('name')->get()]);
    }

    public function store(StoreMaintenanceRequest $request, MachineService $machines): RedirectResponse
    {
        $machines->reportIssue(Machine::findOrFail($request->integer('machine_id')), $request->user(), $request->validated('issue'));
        return back()->with('success', 'Maintenance issue reported.');
    }

    public function fix(MaintenanceLog $maintenanceLog, MachineService $machines): RedirectResponse
    {
        $machines->markFixed($maintenanceLog->id);
        return back()->with('success', 'Machine marked fixed.');
    }
}
