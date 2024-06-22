<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//user routes
Route::middleware(['auth', 'userMiddleware'])->group(function(){
    Route::get('dashboard', [UserController::class,'index'])->name('dashboard');
});
// admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [Admincontroller::class,'index'])->name('admin.dashboard');
    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events');
});


Route::post('/events', [EventController::class, 'store'])->name('events.store');






Route::prefix('admin')->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('admin.events.index');
    Route::post('/events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');
    Route::post('/events/{event}/register', [EventController::class, 'register'])->name('admin.events.register');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('admin.events.show'); // Add this line
    Route::post('/events/{event}/add-comment', [EventController::class, 'addComment'])->name('admin.events.add-comment');

});




