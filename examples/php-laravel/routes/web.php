<?php

use App\Http\Controllers\DemoContentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'demo');

Route::get('/demo/content', [DemoContentController::class, 'index']);
Route::post('/demo/content', [DemoContentController::class, 'store']);
Route::get('/demo/content/{id}', [DemoContentController::class, 'show']);
// Publishing is a field update, not an endpoint of its own. See the controller.
Route::post('/demo/content/{id}/publish', [DemoContentController::class, 'publish']);

// By id, not a list route: `form.getAll()` rows carry only a submissions
// count, so there is nothing to build a form picker from.
Route::get('/demo/forms/{id}', [DemoContentController::class, 'form']);
Route::post('/demo/forms/{id}/submit', [DemoContentController::class, 'submitForm']);

Route::get('/demo/reports/statistics', [DemoContentController::class, 'statistics']);
Route::post('/demo/ai/summarize', [DemoContentController::class, 'summarize']);
