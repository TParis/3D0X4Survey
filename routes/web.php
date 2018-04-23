<?php

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

Auth::routes();

Route::group(['prefix' => 'questions', 'as' => 'questions::'], function() {
  Route::get('/', [
		'as'	=> 'index',
		'uses'	=> 'QuestionController@index'
	]);
  Route::get('/add', [
		'as'	=> 'add',
		'uses'	=> 'QuestionController@add'
	]);
  Route::post('/create', [
		'as'	=> 'create',
		'uses'	=> 'QuestionController@create'
	]);
  Route::get('/edit/{question}', [
		'as'	=> 'edit',
		'uses'	=> 'QuestionController@edit'
	]);
  Route::put('/update/{question}', [
		'as'	=> 'update',
		'uses'	=> 'QuestionController@update'
	]);
});

Route::group(['prefix' => 'answers', 'as' => 'answers::'], function() {
  Route::get('/', [
		'as'	=> 'index',
		'uses'	=> 'AnswerController@index'
	]);
  Route::get('/add', [
		'as'	=> 'add',
		'uses'	=> 'AnswerController@add'
	]);
  Route::post('/create', [
		'as'	=> 'create',
		'uses'	=> 'AnswerController@create'
	]);
  Route::get('/edit/{answer}', [
		'as'	=> 'edit',
		'uses'	=> 'AnswerController@edit'
	]);
  Route::put('/update/{answer}', [
		'as'	=> 'update',
		'uses'	=> 'AnswerController@update'
	]);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{question?}', 'SurveyController@index');
