<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(['auth']);

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');

Route::group(['middleware' => ['auth']],function(){
    Route::post('/posts', [PostController::class, 'store']);

    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});

// change database structure (create table , edit table , add column)
// retrieve, insert, update, delete on database


//1- create database
//2- create tables and relations
//3- insert/retrieve data


    // sync db structure (problem)
    // one db server and all of developers connect on it   (solution)
    // modify column x in db and inside the code modify on x ---> y (problem)
    //database migrations



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
dd($user);

//    $user = User::updateOrCreate([
//        'github_id' => $githubUser->id,
//    ], [
//        'name' => $githubUser->name,
//        'email' => $githubUser->email,
//        'github_token' => $githubUser->token,
//        'github_refresh_token' => $githubUser->refreshToken,
//    ]);
//
//    Auth::login($user);
    // $user->token

    //make get request to github api and get me the repos /repos
});
