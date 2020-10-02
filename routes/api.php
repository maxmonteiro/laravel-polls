<?php

// Options routes
Route::get('/options', 'OptionController@index');
Route::get('/option/{id}', 'OptionController@show');
Route::post('/option', 'OptionController@store');
Route::delete('/option/{id}', 'OptionController@destroy');

// Poll routes
Route::get('/polls', 'PollController@index');
Route::get('/poll/{id}', 'PollController@show');
Route::get('/poll/{id}/stats', 'PollController@pollStatus');
Route::post('/poll', 'PollController@store');
Route::delete('/poll/{id}', 'PollController@destroy');

// Votes rotes
Route::get('/votes', 'VoteController@index');
Route::get('/vote/{id}', 'VoteController@show');
Route::post('/poll/{pollId}/vote', 'VoteController@store');
Route::delete('/vote/{id}', 'VoteController@destroy');
