<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Show the form for creating a new expense report.
     */
    public function create()
    {
        return view('expense.create');
    }

    /**
     * Store a newly created expense report in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'name'           => 'required|min:3|string',
            'email'          => 'required|email',
            'category'       => 'required|string',
            'amount'         => 'required|numeric|min:1',
            'payment_method' => 'required|string',
            'expense_date'   => 'required|date|before_or_equal:today',
            'description'    => 'required|min:5|max:500',
        ], [
            // Custom validation messages (Bonus)
            'name.min' => 'Please provide your full name (at least 3 characters).',
            'amount.min' => 'The expense amount must be at least ₱1.00.',
            'expense_date.before_or_equal' => 'The expense date cannot be in the future.',
        ]);

        // In a real application, you would save this to a database here.
        // For this activity, we will just redirect back with a success message.

        return redirect()->route('expense.create')
            ->with('success', 'Expense report for "' . $validatedData['category'] . '" has been submitted successfully!');
    }
}
