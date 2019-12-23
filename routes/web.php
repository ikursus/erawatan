<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route permohonan tuntutan
// Route::get('tuntutan', 'TuntutanController@index');
// Route::get('tuntutan/tambah', 'TuntutanController@create');
// Route::post('tuntutan/tambah', 'TuntutanController@store');
// Route::get('tuntutan/{id}/edit', 'TuntutanController@edit');
// Route::patch('tuntutan/{id}/edit', 'TuntutanController@update');
// Route::destroy('tuntutan/{id}', 'TuntutanController@destroy');
// Route::get('tuntutan/datatables', 'Pengguna\TuntutanController@datatables');
Route::get('tuntutan/datatables', 'Pengguna\TuntutanController@datatables')->name('tuntutan.datatables');
Route::post('tuntutan/{id}/status', 'Pengguna\TuntutanStatusController@update')->name('tuntutan.status.update');
Route::resource('tuntutan', 'Pengguna\TuntutanController');





Route::get('pengguna', function () {
    
    $users = DB::connection('mysqldbrujukan')
    ->select('select * from tblpengguna');

    // die and dump
    dd($users);

});

Route::get('pengguna/{id}', function($id) {
    $pengguna = DB::connection('mysqldbrujukan')
    ->select('select * from tblpengguna where id = :id', ['id' => $id]);

    dd($pengguna);
});
