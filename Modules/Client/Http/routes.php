<?php

Route::group(['middleware' => 'web', 'prefix' => 'client', 'namespace' => 'Modules\Client\Http\Controllers'], function()
{
    Route::get('/', 'ClientController@index');
    Route::get('/create', 'ClientController@create');
    Route::post('/store', 'ClientController@store');
    Route::get('/edit/{id}', 'ClientController@edit');
    Route::post('/update/{id}', 'ClientController@update');
    Route::get('/delete/{id}', 'ClientController@delete');

    Route::get('/permission/{id}','ClientController@permission');
    Route::post('/permission/add/{id}','ClientController@givePermission');
    Route::post('/permission/remove/{id}','ClientController@removePermission');

    Route::get('/manage-staff/{client_id}','ClientController@manageStaff');
    Route::get('/staff/{client_id}','ClientController@createStaff');
    Route::post('/staff','ClientController@storeStaff');
    Route::get('/staff/edit/{client_id}/{id}','ClientController@editStaff');
    Route::post('/staff/update/{client_id}/{id}','ClientController@updateStaff');
    Route::get('/staff/delete/{client_id}/{id}','ClientController@deleteStaff');

});

Route::group(['middleware' => ['api','cors'], 'prefix' => 'api/client', 'namespace' => 'Modules\Client\Http\Controllers'], function()
{
    Route::get('/', 'ApiClientController@index');
    Route::post('/create', 'ApiClientController@store');
    Route::post('/update/{id}', 'ApiClientController@update');
    Route::get('/delete/{id}', 'ApiClientController@delete');
    Route::post('/get-client', 'ApiClientController@getClient');
    Route::get('/get-client-by-slag/{slag}', 'ApiClientController@getClientBySlag');
});
