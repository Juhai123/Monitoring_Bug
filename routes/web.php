<?php

use App\Http\Controllers\Admin\BugControlller;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\PasswordController as AdminPasswordController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\BugController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\User\TaskController as UserTaskController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('role:user')->name('user.')->prefix('user')->group(function(){
    Route::get('user', [UserController::class, 'index'])->name('index');
    Route::resource('bug', BugController::class);
    Route::resource('task', UserTaskController::class);
    Route::resource('profile', ProfileController::class);
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
    Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
    Route::get('/password', [PasswordController::class, 'edit'])->name('edit.password');
    Route::patch('/password/update',[PasswordController::class, 'update'])->name('password');
    });
    
Route::middleware('role:admin')->name('admin.')->prefix('admin')->group(function(){
    Route::get('admin', [AdminController::class, 'index'])->name('index');
    Route::resource('bug', BugControlller::class);
    Route::resource('task', TaskController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('profile', AdminProfileController::class);
    Route::get('/password', [AdminPasswordController::class, 'edit'])->name('edit.password');
    Route::patch('/password/update', [AdminPasswordController::class, 'update'])->name('password');
    });
    
