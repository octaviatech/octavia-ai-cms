<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoContentController;

Route::view('/', 'demo');
Route::get('/demo/content', [DemoContentController::class, 'index']);
Route::post('/demo/content', [DemoContentController::class, 'store']);
Route::post('/demo/content/{id}/publish', [DemoContentController::class, 'publish']);
