<?php

use Illuminate\Support\Facades\Route;

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

Route::get('{hash}',[\App\Http\Controllers\UrlShortenerController::class,'getUrl'])->name('getUrl');
/* Route::get('/testing', function () {
     $url = "http://testsafebrowsing.appspot.com/apiv4/ANY_PLATFORM/MALWARE/URL/";
        \App\Lib\UrlChecker::isValidURL($url);
 })*/;
Route::get('{path}', function () {
    return view('app');
})->where('path', '(.*)');
