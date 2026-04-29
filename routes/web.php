<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ContactController::class, 'index'])->name('contacts.index');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    if ($request->email === 'admin@admin.com' && $request->password === '123456') {
        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin', 'password' => Hash::make('123456')]
        );
        Auth::login($user);
        return redirect()->route('contacts.index');
    }
    return back()->withErrors(['email' => 'Credenciais inválidas.']);
})->name('login.post');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('contacts.index');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('contacts', ContactController::class)->except(['index']);
});