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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('isLogin')->group(function(){

    //Book creat

    Route::get('/books/create','BookController@create')->name('book.create');
    Route::post('/books/store','BookController@store')->name('book.store');

    //Book updata

    Route::get('/books/edit/{id}','BookController@edit')->name('book.edit');
    Route::post('/books/update/{id}','BookController@update')->name('book.update');



    //cate creat

Route::get('/cate/create','CategoryController@create')->name('cate.create');
Route::post('/cate/store','CategoryController@store')->name('cate.store');

//cate updata

Route::get('/cate/edit/{id}','CategoryController@edit')->name('cate.edit');
Route::post('/cate/update/{id}','CategoryController@update')->name('cate.update');



//logout

Route::get('/logout','AuthController@logout')->name('auth.logout');


//create Note

Route::get('/notes/create','NoteController@create')->name('notes.create');
Route::post('/notes/store','NoteController@store')->name('notes.store');


});

Route::middleware('isGuest')->group(function(){

    //Auth

Route::get('/register','AuthController@register')->name('auth.register');
Route::post('/handel-register','AuthController@handelRegister')->name('handel.register');


/////////////////
//login

Route::get('/login','AuthController@login')->name('auth.login');
Route::post('/handel-login','AuthController@handelLogin')->name('handel.login');




});


Route::middleware('isLoginAdmin')->group(function(){
        //Book Delete
        Route::get('/books/delete/{id}','BookController@delete')->name('book.delete');

        //cate Delete
        Route::get('/cate/delete/{id}','CategoryController@delete')->name('cate.delete');

});


// Book reed

Route::get('/books','BookController@list')->name('book.list');
Route::get('/books/show/{id}','BookController@show')->name('book.show');

// tariqet rout index name btro7 t3mal route fe index
//Route::get('/books','BookController@list')->name('allBooks');
//Route::get('/books/show/{id}','BookController@show')->name('show');




//////////////////////////////////////////


// categories reed

Route::get('/cate','CategoryController@list')->name('cate.list');
Route::get('/cate/show/{id}','CategoryController@show')->name('cate.show');


/////////////////////////////////////////////////////////////////////////


