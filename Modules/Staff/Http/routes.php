<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Staff\Http\Controllers'], function()
{
    // ROUTE HOME ADMIN

    Route::get('/', 'HomeController@index')->name('admin');


    // ROUTE ADMIN
    Route::group(['prefix'=>'staff'], function (){
        Route::get('/', 'StaffController@index')->name('staff');
        Route::get('/modal-create', 'StaffController@create')->name('staff.create');
    });
});
