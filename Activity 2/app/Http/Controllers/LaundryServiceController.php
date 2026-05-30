<?php

namespace App\Http\Controllers;

use App\Models\LaundryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaundryServiceController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $laundryServices = LaundryService::query()
            ->when($search, function ($query) use ($search): void {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('detergent_type', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('laundry-services.index', compact('laundryServices', 'search'));
    }

    public function create(): View
    {
        return view('laundry-services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        LaundryService::create($this->validatedData($request));

        return redirect()
            ->route('laundry-services.index')
            ->with('success', 'Laundry service package added successfully.');
    }

    public function show(LaundryService $laundryService): View
    {
        return view('laundry-services.show', compact('laundryService'));
    }

    public function edit(LaundryService $laundryService): View
    {
        return view('laundry-services.edit', compact('laundryService'));
    }

    public function update(Request $request, LaundryService $laundryService): RedirectResponse
    {
        $laundryService->update($this->validatedData($request));

        return redirect()
            ->route('laundry-services.show', $laundryService)
            ->with('success', 'Laundry service package updated successfully.');
    }

    public function destroy(LaundryService $laundryService): RedirectResponse
    {
        $laundryService->delete();

        return redirect()
            ->route('laundry-services.index')
            ->with('success', 'Laundry service package deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'category' => ['required', 'string', 'max:80'],
            'price' => ['required', 'numeric', 'min:0'],
            'duration_minutes' => ['required', 'integer', 'min:1'],
            'detergent_type' => ['required', 'string', 'max:80'],
            'description' => ['nullable', 'string', 'max:500'],
            'is_available' => ['nullable', 'boolean'],
        ]);

        $validated['is_available'] = $request->boolean('is_available');

        return $validated;
    }
}
