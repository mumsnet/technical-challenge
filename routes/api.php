<?php

use App\Http\Controllers\Api\CreateBookController;
use App\Http\Controllers\Api\GetBookController;
use App\Http\Controllers\Api\GetCollectorSummaryController;
use Illuminate\Support\Facades\Route;

Route::post('books', CreateBookController::class);
Route::get('books/{uuid}', GetBookController::class);
Route::get('collectors/{id}/recently-added', GetCollectorSummaryController::class);
