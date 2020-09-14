<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//book api

//get all book
Route::middleware('isApiLogin')->group(function(){
Route::get('/books','ApiBookController@index');
});
//show book
Route::get('/books/show/{id}','ApiBookController@show');

// Route::middleware('isApiLogin')->group(function(){
//     //create books
//     Route::post('/books/store','ApiBookController@store');

//     //update books
//     Route::post('/books/update/{id}','ApiBookController@update');

//     //delete books
//     Route::get('/books/delete/{id}','ApiBookController@delete');

//

  //create books
     Route::post('/books/store','ApiBookController@store');

//     //update books
     Route::post('/books/update/{id}','ApiBookController@update');

//     //delete books
     Route::get('/books/delete/{id}','ApiBookController@delete');



//////////////////////////////////////////////////////
//api auth

//login -register
Route::post('handel-login','ApiAuthController@handelLogin');
Route::post('handel-register','ApiAuthController@handelRegister');


Route::post('logout','ApiAuthController@logout');




