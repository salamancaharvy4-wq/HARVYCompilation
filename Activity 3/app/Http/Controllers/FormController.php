<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
    public function create(): View
    {
        return view('form.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'participant_name' => ['required', 'string', 'min:3', 'max:80'],
            'email' => ['required', 'email', 'max:120'],
            'age' => ['required', 'numeric', 'min:18', 'max:65'],
            'workshop_track' => ['required', 'in:Digital Art,Basic Coding,Video Editing,Public Speaking'],
            'session_count' => ['required', 'integer', 'min:1', 'max:6'],
            'learning_goal' => ['required', 'string', 'min:10', 'max:500'],
        ], [
            'participant_name.required' => 'Please enter the participant name.',
            'participant_name.min' => 'The participant name must be at least 3 characters.',
            'age.min' => 'Participants must be at least 18 years old.',
            'workshop_track.required' => 'Please choose a workshop track.',
            'session_count.max' => 'You can reserve up to 6 sessions only.',
            'learning_goal.min' => 'Please describe your learning goal in at least 10 characters.',
        ]);

        return redirect()
            ->route('form.create')
            ->withInput($validated)
            ->with('success', 'Workshop enrollment submitted successfully for '.$validated['participant_name'].'.');
    }
}
