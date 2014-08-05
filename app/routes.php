<?php

/*-------------------------------------------------------------------------------------------------
// ! Index
-------------------------------------------------------------------------------------------------*/
Route::get('/', 'IndexController@getIndex');

/*-------------------------------------------------------------------------------------------------
// ! Question 
Implicit RESTful Routing
-------------------------------------------------------------------------------------------------*/
Route::get('/question/', 'QuestionController@getIndex');
Route::get('/question/create', 'QuestionController@getList');
Route::post('/question/create', 'QuestionController@postInsert');
Route::post('/question/update', 'QuestionController@postEdit');
Route::get('/question/delete/{id}','QuestionController@getDelete');

/*-------------------------------------------------------------------------------------------------
// ! Explicit Routing for Question types
-------------------------------------------------------------------------------------------------*/
Route::get('/questiontype/', 'QuestionTypeController@getIndex');
Route::post('/questiontype/update', 'QuestionTypeController@postEdit');
Route::post('/questiontype/create', 'QuestionTypeController@postInsert');
Route::get('/questiontype/delete/{id}','QuestionTypeController@getDelete');

/*-------------------------------------------------------------------------------------------------
// ! Answer 
Implicit RESTful Routing
-------------------------------------------------------------------------------------------------*/
Route::get('/answer/', 'UserQuestionAnswerController@getIndex');
Route::post('/answer/update', 'UserQuestionAnswerController@postEdit');
Route::post('/answer/create', 'UserQuestionAnswerController@postInsert');
Route::get('/answer/delete/{id}','UserQuestionAnswerController@getDelete');

/*-------------------------------------------------------------------------------------------------
// ! User
Explicit Routing taken from FooBooks from class project
-------------------------------------------------------------------------------------------------*/
# Note: the beforeFilter for 'guest' on getSignup and getLogin is handled in the Controller
Route::get('/user', 'UserController@getIndex'); 
Route::get('/signup', 'UserController@getSignup'); 
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', ['before' => 'csrf', 'uses' => 'UserController@postSignup'] );
Route::post('/login', ['before' => 'csrf', 'uses' => 'UserController@postLogin'] );
Route::get('/logout', ['before' => 'auth', 'uses' => 'UserController@getLogout'] );