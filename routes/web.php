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

Route::get('/home', function () {
    return view('adm.index');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/tes', function () {
    return view('tes');
});

Route::get('/login', function(){
    return redirect('/auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'AuthController@logout');

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'AuthController@logout');

Route::resource('pertemuan', 'pertemuanController')->middleware('auth');
Route::get('/detail/{id}', 'detailController@index')->name('detail')->middleware('auth');
Route::post('/detail/{id}', 'detailController@store')->name('store')->middleware('auth');
Route::resource('exam', 'examController')->middleware('auth');
Route::get('/answer/{id}', 'answerController@index')->name('answer')->middleware('auth');
Route::post('/answer/{id}', 'answerController@store')->name('store')->middleware('auth');
Route::get('/score/{id}', 'scoreController@index')->name('score')->middleware('auth');
Route::post('/score/{id}', 'scoreController@store')->name('store')->middleware('auth');
Route::get('/rekap/{id}', 'rekapController@index')->name('rekap')->middleware('auth');

Route::resource('level', 'LevelController')->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
Route::resource('kelas', 'kelasController')->middleware('auth');
Route::get('detail/kehadiran/{id}', 'detailController@kehadiran')->name('kehadiran')->middleware('auth');

Route::resource('quiz', 'quizController')->middleware('auth');
Route::get('/nilai/{id}', 'nilaiController@index')->name('nilai')->middleware('auth');
Route::post('/nilai/{id}', 'nilaiController@store')->name('store')->middleware('auth');
Route::get('/soal/{id}', 'soalController@index')->name('soal')->middleware('auth');
Route::post('/soal/{id}', 'soalController@store')->name('store')->middleware('auth');
Route::get('/jawaban/{quiz_id}/{user_id}', 'jawabanController@index')->name('jawaban')->middleware('auth');
Route::post('/jawaban/{quiz_id}/{user_id}', 'jawabanController@store')->name('store')->middleware('auth');



