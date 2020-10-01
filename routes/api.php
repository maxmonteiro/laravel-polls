<?php

Route::get('/polls', 'PollController@index');
Route::get('/poll/{id}', 'PollController@show');
Route::post('/poll', 'PollController@store');
Route::delete('/poll/{id}', 'PollController@delete');
