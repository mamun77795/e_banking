<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
    return view('login');
});

Route::get('/', function () {
    $session_id = session('sess_id');
    if (!isset($session_id)) {
        return view('login');
    }else{
        $users = User::all();
        return view('pages.erp.user.index', compact('users'));
    }
})->name('login');


Route::post('/login', [AuthController::class, 'auth'])->name('auth');

Route::middleware(['check'])->group(function () {
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/show', [TransactionController::class, 'all_transaction'])->name('all_transaction');
    Route::get('/deposit', [TransactionController::class, 'deposit_transaction'])->name('deposit_transaction');
    Route::post('/deposit', [TransactionController::class, 'deposit'])->name('deposit');
    Route::get('/withdrawal', [TransactionController::class, 'withdrawal_transaction'])->name('withdrawal_transaction');
    Route::post('/withdrawal', [TransactionController::class, 'withdrawal'])->name('withdrawal');
    Route::get('/create-wdr', [TransactionController::class, 'create_wdr'])->name('create_wdr');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('users', UserController::class);
    Route::resource('transactions', TransactionController::class);
    
});