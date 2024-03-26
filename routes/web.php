<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', [EventController::class, 'getAll'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [EventController::class, 'getAll'])->name('dashboard');
    Route::post('/dashboard', [EventController::class, 'create'])->name('events.create');
    Route::put('/dashboard/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::delete('/dashboard/delete/{id}', [EventController::class, 'delete'])->name('events.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('/dashboard', EventController::class);

require __DIR__ . '/auth.php';
