<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SectionController;
Route::get('/', [SectionController::class, 'showAll'])->name('homePage');

use App\Http\Controllers\TopicController;
Route::get('/section-{section}', [TopicController::class, 'topicSelect']);
Route::post('/section-{section}', [TopicController::class, 'create']);

use App\Http\Controllers\UserController;
Route::get('/register', [UserController::class, 'registerForm']);
Route::post('/register', [UserController::class, 'create']);
Route::match(['get', 'post'],'/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::match(['get', 'post'],'/profile/{id}', [UserController::class, 'showOne'])->where('id', '\d+');

use App\Http\Controllers\PostController;
Route::get('/topic/{topicId}', [PostController::class, 'postSelect'])->where('id', '\d+')->name('postSelect');
Route::post('/topic/{topicId}', [PostController::class, 'create'])->where('id', '\d+');
Route::match(['get', 'post'], '/editPost/{id}', [PostController::class, 'editPost'])->where('id', '\d+');
Route::get('/delete_post/{id}', [PostController::class, 'delete'])->where('id', '\d+');

