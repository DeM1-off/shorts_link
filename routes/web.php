<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;


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

Route::get('/', [ShortLinkController::class, 'index']);
Route::post('/', [ShortLinkController::class, 'store']);

Route::group([ 'middleware' => 'check_link'], function () {
    Route::get('{code}', [ShortLinkController::class, 'shortenLink'])->name('shorten.link');
});

 Route::get('/page/404', function () {
     return view('page.404');
 });
