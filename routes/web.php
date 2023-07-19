<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\News\PostController;
use App\Http\Controllers\Tags\TagsController;
use App\Http\Controllers\CardsNews\CardsNewsController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\SavedRecordeController;
use App\Http\Controllers\UserNews\RoleController;
use App\Http\Controllers\UserNews\UserRoleController;

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

Route::get('/', [MasterController::class,'cards']);

//========================Notification News=======================
Route::get('showPos/{id}',[PostController::class,'show_Notification'])->name('postShow');

//========================Notification News=======================
Route::get('Markread',[PostController::class,'Markread'])->name('Markread');

//========================Spatie Permission=======================
Route::group(['Middleware'=>['auth']],function() {

//========================Spatie Permission=======================
    Route::resource('roles',RoleController::class);

//========================Users Permission=======================
    Route::resource('users',UserRoleController::class);

    //==========================Update profile===========================
Route::put('updateUsers', [UserRoleController::class,'update'])->name('updateUsers');

});

//======================== Auth=======================
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//==========================edit profile===========================
Route::get('edit_profile', [HomeController::class,'edit'])->name('edit_profile');

//==========================Update profile===========================
Route::put('updateUser', [HomeController::class,'update'])->name('updateUser');

//========================Categories=======================
    Route::resource('Categories', CategoryController::class);

//==========================News===========================
    Route::resource('News', PostController::class);
Route::post('Filter_News', [PostController::class,'Filter_Classes'])->name('Filter_Classes');

//==========================Tags===========================
Route::resource('Tags', TagsController::class);

//==========================saved records===========================
Route::post('Saved_Records', [SavedRecordeController::class,'store'])->name('Saved_Records');
//==========================Show saved records===========================
Route::get('showSave',[SavedRecordeController::class,'showSave'])->name('showSave');
//==========================delete saved records===========================
Route::post('deleteSave',[SavedRecordeController::class,'deleteSaved'])->name('deleteSave');

//==========================show news ===========================
Route::get('showNews/{id}',[MasterController::class,'showNews'])->name('showNews');

//==========================show news ===========================
Route::post('add_comment',[PostController::class,'add_comment'])->name('add_comment');

//==========================CardsNews===========================
Route::get('newsPolitics', [CardsNewsController::class,'show_POLITICS'])->name('POLITICS');
Route::get('newsSPORTS', [CardsNewsController::class,'show_SPORTS'])->name('SPORTS');
Route::get('newsBUSINESS', [CardsNewsController::class,'show_BUSINESS'])->name('BUSINESS');
Route::get('newsTECHNOLOGY', [CardsNewsController::class,'show_TECHNOLOGY'])->name('TECHNOLOGY');
Route::get('newsHEALTH', [CardsNewsController::class,'show_HEALTH'])->name('HEALTH');
Route::get('newsENTERTAINMENT', [CardsNewsController::class,'show_ENTERTAINMENT'])->name('ENTERTAINMENT');
Route::get('newsBreaking', [CardsNewsController::class,'show_BREAKING'])->name('BREAKING');
Route::get('newsScience', [CardsNewsController::class,'show_Science'])->name('SCIENCE');
Route::get('newsEducation', [CardsNewsController::class,'show_Education'])->name('EDUCATION');
Route::get('newsEnvironment', [CardsNewsController::class,'show_Environment'])->name('ENVIRONMENT');


//==========================Get To Select Any Page===========================
Route::get('/{page}', [AdminController::class,'index']);
