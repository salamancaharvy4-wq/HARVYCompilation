<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return redirect()->route('form.create');
});

Route::get('/form', [FormController::class, 'create'])->name('form.create');
Route::post('/form', [FormController::class, 'store'])->name('form.store');

// Expense Report Routes
Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
