<?php

use App\Http\Controllers\UtilityController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get(uri:'/hello-world',action:function() {
//     return 'hello world';
// });

// Route::get(uri:'/hello-world',action:fn() => 'hello world');

Route::get(uri:'/hello-world',action:fn() => view(view:'hello_world'));

Route::get('/hello', fn() => view('hello', [
    'name' => '山田',
    'course' => 'laravel9'
]));

Route::get('/',fn() => view(view: 'index'));


Route::get('/curriculum',fn() => view(view: 'curriculum'));

// 世界の時間
Route::get('/world-time', [App\Http\Controllers\UtilityController::class,'worldTime']);

// おみくじ
Route::get('/omikuji', [App\Http\Controllers\GameController::class,'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall',[App\Http\Controllers\GameController::class,'montyHall']);

// リクエスト
Route::get('/form', [App\Http\Controllers\RequestSampleController::class,'form']);
Route::get('/query-strings', [App\Http\Controllers\RequestSampleController::class,'queryStrings']);
