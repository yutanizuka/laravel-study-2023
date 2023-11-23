<?php

use App\Http\Controllers\UtilityController;
// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HilowController;

use App\Http\Controllers\RequestSampleController;

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
Route::get('/query-strings', [App\Http\Controllers\RequestSampleController::class,'queryStrings']);
Route::get('/users/{id}',[App\Http\Controllers\RequestSampleController::class, 'profile'])->name(name: 'profile');
Route::get('/products/{category}/{year}',[App\Http\Controllers\RequestSampleController::class,'productsArchive']);
Route::get('/route-link', [App\Http\Controllers\RequestSampleController::class, 'routeLink']);
Route::get('/form', [App\Http\Controllers\RequestSampleController::class,'form']);

// //ログイン
// Route::get('/login', 'App\Http\Controllers\RequestSampleController@loginForm');
Route::get('/login', [App\Http\Controllers\RequestSampleController::class, 'loginForm']);
Route::post('/login', [App\Http\Controllers\RequestSampleController::class, 'login'])->name('login');

Route::resource('/events',App\Http\Controllers\EventController::class)->only(['index','create','store']);


// ハイローゲーム
Route::get('/hi-low', [HilowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HilowController::class, 'result']);

Route::resource('/photos',App\Http\Controllers\PhotoController::class)->only(['create','store','show','destroy']);
