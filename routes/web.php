<?php

use App\Http\Controllers\ServiceAvailmentController;
use Illuminate\Support\Facades\Route;

Route::resource('services', ServiceAvailmentController::class);