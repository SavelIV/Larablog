<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Cabinet\Comments\CommentController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController')->name('/');
    Route::get('/about', 'AboutController')->name('about');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact', 'ContactController@sendContactMail')->name('send-mail');
});

Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'], function () {
    Route::get('/categories/{categoryId?}', 'IndexController@index')->name('blog.index');
    Route::get('/show/{post}', 'IndexController@show')->name('blog.show');
    Route::post('/post/{post}/comments', 'IndexController@comments')->name('blog.post.comments');
    Route::post('/post/{post}/likes', 'IndexController@likes')->name('blog.post.likes');
});

Route::group(['namespace' => 'App\Http\Controllers\Cabinet', 'prefix' => 'cabinet', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('cabinet.index');
    });
    Route::resource('comments', CommentController::class);
    Route::group(['namespace' => 'Likes'], function () {
        Route::get('likes', 'LikeController@index')->name('likes.index');
        Route::get('likes/unlike/{post}', 'LikeController@unlike')->name('likes.unlike');
    });
    Route::group(['namespace' => 'Settings'], function () {
        Route::get('settings', 'SettingController@edit')->name('cabinet.settings');
        Route::put('settings', 'SettingController@update')->name('cabinet.settings.update');
        Route::delete('settings', 'SettingController@deleteImage')->name('cabinet.settings.deleteImage');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'verified', 'moderator']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.index');
    });
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/trash-posts/{post}/restore', 'TrashPostController@restore')->name('post.restore');
        Route::delete('/trash-posts/{post}/forceDelete', 'TrashPostController@forceDelete')->name('post.forceDelete');
    });
    Route::resource('posts', PostController::class)->withTrashed(['show']);
    Route::resource('users', UserController::class)->middleware(['admin']);
});

Auth::routes(['verify' => true]);

