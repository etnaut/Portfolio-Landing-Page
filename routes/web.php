<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VisitorController;

Route::get('/', function (Illuminate\Http\Request $request) {
    app(VisitorController::class)->logVisit($request);
    return view('welcome');
});

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Viewer Stats & Identification Routes
Route::get('/api/viewers', [VisitorController::class, 'stats']);
Route::post('/api/viewers/ping', [VisitorController::class, 'ping']);
Route::post('/api/viewers/set-name', [VisitorController::class, 'setName']);


