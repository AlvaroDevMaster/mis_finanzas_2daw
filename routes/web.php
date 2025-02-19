<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('incomes', IncomeController::class)->names('incomes');
Route::resource('spendings', SpendingController::class)->names('spendings');
Route::resource('categories', CategoryController::class)->names('categories');