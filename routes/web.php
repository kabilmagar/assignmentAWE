<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Check;
use App\Http\Controllers\CdController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;

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

Route::get('/check',[Check::class,'index']);

Route::get('view-cd-table',[CdController::class,'viewCdTable'])->name('cd');
Route::get('view-game-table',[GameController::class,'viewGameTable'])->name('games');
Route::get('view-book-table',[BookController::class,'viewBookTable'])->name('books');
Route::group(['middleware'=>'role'],function(){
    // cds
    Route::get('save-cd/{id?}',[CdController::class,'index']);
    Route::get('delete-cd/{id}',[CdController::class,'deleteCd']);
    Route::post('post-cd',[CdController::class,'save']);

    // games
    Route::get('save-game/{id?}',[GameController::class,'index']);
    Route::get('delete-game/{id}',[GameController::class,'deleteGame']);
    Route::post('post-game',[GameController::class,'save']);

    //books
    Route::get('save-book/{id?}',[BookController::class,'index']);
    Route::get('delete-book/{id}',[BookController::class,'deleteBook']);
    Route::post('post-book',[BookController::class,'save']);
});
//front end

Route::get('/',[HomeController::class,'index']);

Route::post('send-mail',[HomeController::class,'sendMail']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
