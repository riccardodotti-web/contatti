<?php
Route::group(['middleware' => 'web'], function() {
    // Place all your web routes here...
    Route::resource('contatti','Rdotti\Contatti\Http\Controllers\ContattiController');
});

//Route::get('contatti', 'Rdotti\Contatti\Http\Controllers\ContattiController@index');