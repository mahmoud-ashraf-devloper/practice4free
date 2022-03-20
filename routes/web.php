<?php

use App\Events\MessageSent;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->name('dashboard');            

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/room/{roomId}', [RoomController::class, 'index'])->middleware('auth') ->name('room');
Route::get('/room/{roomId}/roommates', [RoomController::class, 'returnRoomUsers'])->middleware('auth');
Route::post('/room/{roomId}/user/{userId}/join', [RoomController::class, 'joinRoom'])->middleware('auth');
Route::post('/room/create', [RoomController::class, 'create'])->middleware('auth') ->name('create-new-room');
Route::post('/room/{roomId}/user/{userId}/left', [RoomController::class, 'left'])->middleware('auth') ->name('user-is-leaving');


Route::get('/trigger/{data}', function($data){
    echo $data;
    event(new App\Events\MessageSent($data));
});

Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

Route::get('websocket/{something}', function($something){
    $req = Http::withToken('02e494800d5fb53836a495d358e98a34')->get('http://127.0.0.1:6001/apps/MyApp/status?auth_key=02e494800d5fb53836a495d358e98a34');
    return $req->getBody();
});