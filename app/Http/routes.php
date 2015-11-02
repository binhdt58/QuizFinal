<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('AdminMathQuiz', function(){
    return view('AdminMathQuiz');
});

Route::get('/AdminEditMathQuiz', function () {
    return view('AdminEditMathQuiz');
});

Route::post('/AdminEditMathQuiz','QuizController@postaddquiz');


Route::get('/userProfile', function () {
    return view('userProfile');
});

Route::get('/deleteQuestion{id}', function($id){
    \App\Http\Controllers\QuizController::questionDelete($id);
    return view('AdminEditMathQuiz');
});

Route::get('/login/{user}/{pass}', function($user, $pass){
   if(\App\Http\Controllers\UserQuizFinalController::login($user, $pass)){
       view('index');
       echo '<script>app.controller(\'LoginForm\', function( $scope ) {$scope.loged=true;});</script>';
   }
});

Route::post('/register/{id}/{pass}', function($id, $pass){
    \App\Http\Controllers\UserQuizFinalController::register($id, $pass);
});

//Chuy?n ??n c�c trang quiz
Route::get('/mathQuiz', function(){
    return view('mathQuiz');
});

Route::get('/funnyQuiz', function(){
    return view('funnyQuiz');
});

Route::get('/travelQuiz', function(){
    return view('travelQuiz');
});

Route::get('/footballQuiz', function(){
    return view('footballQuiz');
});

Route::get('/IQQuiz', function(){
    return view('IQQuiz');
});

Route::get('/japanQuiz', function(){
    return view('japanQuiz');
});

//Chuy?n ??n c�c trang editQuiz
Route::get('/editMathQuiz', function(){
   return view('');
});

Route::get('/editFunnyQuiz', function(){
    return view('editFunnyQuiz');
});

Route::get('/editTravelQuiz', function(){
    return view('editTravelQuiz');
});

Route::get('/editFootballQuiz', function(){
    return view('editFootballQuiz');
});

Route::get('/editIQQuiz', function(){
    return view('editIQQuiz');
});

Route::get('/editJapanQuiz', function(){
    return view('editJapanQuiz');
});