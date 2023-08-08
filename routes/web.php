<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
    Route::get('/setfree', function () {
        $user = Auth::user();
        $user->status = 'free';
        $user->save();
        return view('dashboard');
    })->name('setfree');
    Route::get('/setbusy', function () {
        $user = Auth::user();
        $user->status = 'busy';
        $user->save();
        return view('dashboard');
    })->name('setbusy');
    Route::get('/setvip', function () {
        $user = Auth::user();
        $user->status = 'vip';
        $user->save();
        return view('dashboard');
    })->name('setvip');
});

require __DIR__.'/auth.php';
