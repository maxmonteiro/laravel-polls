<?php

// Options routes
Route::get('/options', 'OptionController@index');
Route::get('/option/{id}', 'OptionController@show');
Route::post('/option', 'OptionController@store');
Route::delete('/option/{id}', 'OptionController@destroy');

// Poll routes
Route::get('/polls', 'PollController@index');
Route::get('/poll/{id}', 'PollController@show');
Route::post('/poll', 'PollController@store');
Route::delete('/poll/{id}', 'PollController@destroy');
