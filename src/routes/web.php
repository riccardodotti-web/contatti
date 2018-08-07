<?php
Route::group(['middleware' => 'web'], function() {
    // Place all your web routes here...
    Route::resource('contatti','Rdotti\Contatti\Http\Controllers\ContattiController');
    Route::get('/mail', function () {
        return new Rdotti\Contatti\Mail\MessageSent('Riccardo', 'riccardodotti.web@gmail.com', 'Messaggio');
    });
});