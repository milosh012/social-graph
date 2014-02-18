<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::bind('Repositories\FriendRepositoryInterface', 'Repositories\EloquentFriendRepository');

Route::get('/', function()
{
  return View::make('index');
});

// Return those people who are directly connected to the chosen person.
Route::get('/users/{id}/friends', 'FriendsController@getUserFriends');

// Return those who are two steps away, but not directly connected to the chosen person.
Route::get('/users/{id}/friends-of-friends', 'FriendsController@getUserFriendsOfFriends');

// Return people in the group who know 2 or more direct friends of the chosen person,
// but are not directly connected to her.
Route::get('/users/{id}/suggested-friends', 'FriendsController@getUserSuggestedFriends');

Route::get('/users', 'UsersController@index');
