<?php

use App\Http\Controllers\LaundryServiceController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/laundry-services');

Route::resource('laundry-services', LaundryServiceController::class);
