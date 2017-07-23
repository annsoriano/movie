<?php

Auth::routes();

Route::group(['namespace'=>'General'],function(){
	Route::get('/', 'PagesController@index' )->name('home');

	Route::get('/entry/movie','PagesController@movie');

	Route::get('/entry/tv','PagesController@tvshow');

	Route::get('entry/new','PagesController@newEntry');

	Route::get('/entry/genre/{genre}','PagesController@showGenre');
	
	Route::get('/search/{title}','SearchController@show');
});
		

Route::group(['namespace'=>'Admin'],function(){

	Route::get('/entry/edit-list','EntryController@showlist');

	Route::get('/entry/create','EntryController@create');

	Route::post('/entry/create','EntryController@store');

	Route::get('/entry/edit/{entry}','EntryController@editForm');

	Route::patch('/entry/edit/{entry}','EntryController@update');

	Route::get('/entry/delete','EntryController@delete');

	Route::delete('/entry/delete/{entry}','EntryController@destroy');
});

	
Route::get('/entry/{entry}','General\PagesController@show');

Route::get('/user/{user}','User\UserController@showProfile');
	

