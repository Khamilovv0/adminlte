<?php

use Illuminate\{Support\Facades\Route, Support\Facades\Auth};

use App\Http\Controllers\{UserController, HomeController, VideoController, ProfileController, UserNewsController};


Route::get('/', function () {
    return view('/userPages/index');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('navigation', [HomeController::class, 'categories'])->name('categories');

    Route::post('/home/submit',[HomeController::class, 'submit'])->name('news');
    Route::get('users/{id}', [UserController::class, 'oneUser'])->name('one-user');
    Route::get('/home/all',[HomeController::class, 'allData'])->name('all-data');
    Route::get('home/all/{id}', [HomeController::class, 'oneNews'])->name('one-news');
    Route::get('home/all/{id}/delete', [HomeController::class, 'deleteNews'])->name('news-delete');
    Route::get('home/byCategory/{id}', [HomeController::class, 'catNews'])->name('cat_news');
    Route::get('/home/category', [HomeController::class, 'categories'])->name('category');
    Route::post('/home/category/submit', [HomeController::class, 'addCategory'])->name('add-category');
    Route::get('home/category/{id}/delete', [HomeController::class, 'deleteCategory'])->name('category-delete');
    Route::post('videoDownload', [VideoController::class, 'forVideo'])->name('forVideos');
    Route::get('/videoDownload/all',[VideoController::class, 'video'])->name('all-video');
    Route::get('videoDownload', [VideoController::class, 'create'])->name('videoDownload');
});
    Route::get('/userPages/category/{id}', [UserNewsController::class, 'byCategory'])->name('categoryNews');
    Route::get('/index', [UserNewsController::class, 'forNews'])->name('forNews');
    Route::get('/index', [UserNewsController::class, 'byVideo'])->name('userVideos');
    Route::get('/index/oneNews/{news_id}', [UserNewsController::class, 'oneNews'])->name('userNews');
    Route::post('/index/oneNews/{news_id}/comment', [UserNewsController::class, 'comment'])->name('userComment');
    Route::get('/index/{month_id}', [UserNewsController::class, 'month'])->name('sortByMonth');
    Route::get('/videos', [UserNewsController::class, 'video'])->name('videos');





