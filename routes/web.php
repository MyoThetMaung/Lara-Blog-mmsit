<?php

use App\Mail\TestingMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\CategoryController;

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::get('/pdf', [HomeController::class, 'pdf'])->name('pdf');
Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get('/detail/{id}',[PageController::class,'detail'])->name('page.detail');

Route::group(['middleware'=>'auth'],function(){
    Route::resource('nation',NationController::class);
    Route::resource('post',PostController::class);
    Route::resource('photos',ImageController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('user',UserController::class);
});

Route::get('mailTesting',function(){
    $emails = [
        'hehe@gmail.com',
        'hello@gmail.com',
        'hi@gmail.com'
    ];
    foreach($emails as $email){
        Mail::to($email)->later(now()->addMinute(1),new TestingMail('Hello','my name is saimon'));
    }
    return redirect()->route('page.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
