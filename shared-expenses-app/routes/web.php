<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupMemberController;
use App\Http\Controllers\GroupController;

Route::middleware(['auth'])->group(function () {

    Route::resource('groups', GroupController::class);

});

Route::post(
'/groups/{group}/members',
[GroupMemberController::class,'store']
);

Route::delete(
'/groups/{group}/members/{member}',
[GroupMemberController::class,'destroy']
);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
