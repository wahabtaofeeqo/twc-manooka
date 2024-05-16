<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', 'PagesController@index')->name('index');

// Dashboard Router
Route::get('/dashboard', 'PagesController@dashboard')->middleware(['auth'])->name('dashboard');

// Event
Route::group(['prefix' => 'events', 'middleware' => ['auth']], function () {
    Route::post('/', 'EventController@store')->name('event.store');
});

// Agent
Route::group(['prefix' => 'agents/dashboard', 'middleware' => ['auth', 'is.agent']], function () {
    Route::get('/', 'Agents\MainController@index')->name('agent.index');
});

// Admin
Route::group(['prefix' => 'admins/dashboard', 'middleware' => ['auth', 'is.admin']], function () {
    Route::get('/', 'Admin\MainController@index')->name('admin.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
