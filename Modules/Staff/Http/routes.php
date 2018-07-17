<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Staff\Http\Controllers'], function()
{
    // ROUTE HOME ADMIN
    Route::get('/', 'HomeController@index')->name('admin');

    // ROUTE ADMIN
    Route::group(['prefix'=>'staff'], function (){
        Route::get('/', 'StaffController@index')->name('staff');
        Route::post('/get-list-staff', 'StaffController@getListStaff')->name('staff.get-list-staff');
        Route::get('/modal-create', 'StaffController@create')->name('staff.create');
        Route::get('/modal-edit/{id}', 'StaffController@edit')->name('staff.edit');
        Route::post('/create-staff', 'StaffController@store')->name('staff.create-staff');
        Route::post('/update-staff', 'StaffController@update')->name('staff.update-staff');
        Route::post('/change-status-staff', 'StaffController@changeStatus')->name('staff.change-status-staff');
        Route::get('/destroy-staff/{id}', 'StaffController@destroy')->name('staff.destroy-staff');
        Route::get('/show-action-change', 'StaffController@showChangeAction')->name('staff.show-action-change');
        Route::post('/status-staff', 'StaffController@getListStatus')->name('staff.status-staff');
    });

    // ROUTE CATEGORY
    Route::group(['prefix'=>'category'], function (){
        Route::get('/', 'CategoryController@index')->name('category');
        Route::post('/get-list-staff', 'CategoryController@getListCategory')->name('staff.get-list-category');
//        Route::get('/modal-create', 'StaffController@create')->name('staff.create');
//        Route::get('/modal-edit/{id}', 'StaffController@edit')->name('staff.edit');
//        Route::post('/create-staff', 'StaffController@store')->name('staff.create-staff');
//        Route::post('/update-staff', 'StaffController@update')->name('staff.update-staff');
//        Route::post('/change-status-staff', 'StaffController@changeStatus')->name('staff.change-status-staff');
//        Route::get('/destroy-staff/{id}', 'StaffController@destroy')->name('staff.destroy-staff');
//        Route::get('/show-action-change', 'StaffController@showChangeAction')->name('staff.show-action-change');
//        Route::post('/status-staff', 'StaffController@getListStatus')->name('staff.status-staff');
    });
});
