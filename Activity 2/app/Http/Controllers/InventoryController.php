<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Models\InventoryItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InventoryController extends Controller
{
    public function index(): View { return view('inventory.index', ['items' => InventoryItem::orderBy('name')->get()]); }
    public function store(StoreInventoryRequest $request): RedirectResponse
    {
        InventoryItem::updateOrCreate(['name' => $request->validated('name')], $request->validated());
        return back()->with('success', 'Inventory saved.');
    }
}
