<?php

Route::group(['middleware' => 'web', 'prefix' => 'event', 'namespace' => 'Modules\Event\Http\Controllers'], function()
{

    Route::get('/details/{event_id}', 'EventController@event_details');
    
    Route::get('/view', 'EventController@index');
    Route::get('/create', 'EventController@create');
    Route::post('/store', 'EventController@store');
    Route::get('/edit/{id}', 'EventController@edit');
    Route::post('/update/{id}', 'EventController@update');
    Route::get('/delete/{id}', 'EventController@delete');
    Route::get('/single-view/{id}', 'EventController@single_view');

//Partner
    Route::get('/add_partner/{event_id}/{client_id}', 'EventController@add_partner');
    Route::get('/delete_partner/{id}', 'EventController@delete_partner');
    Route::post('/store_partner', 'EventController@store_partner');
//Form  
    Route::get('/add_form/{event_id}/{client_id}', 'EventController@add_form');
    Route::post('/assign_form', 'EventController@assign_form');
    Route::get('/delete_form/{id}', 'EventController@delete_form');
    Route::post('/change_status_of_assigned_form', 'EventController@change_status_of_assigned_form');
//Image
    Route::get('/add_image/{event_id}/{client_id}', 'EventController@add_image');
    Route::post('/store_image', 'EventController@store_image');
    Route::get('/delete_image/{id}/{event_id}/{client_id}', 'EventController@delete_image');
    Route::post('/change_status_of_image/{event_id}/{client_id}', 'EventController@change_status_of_image');
//Ticket
    Route::get('/add_ticket/{event_id}', 'EventController@add_ticket');
    Route::post('/store_ticket', 'EventController@store_ticket');
    Route::get('/delete_ticket/{id}/{event_id}/{client_id}', 'EventController@delete_ticket');
    Route::post('/change_status_of_ticket/{event_id}', 'EventController@change_status_of_ticket');
//Category
    Route::get('/event-category/{event_id}','EventController@event_category');
    Route::post('/event-category','EventController@event_category_store');
    Route::get('/delete-event-category/{category_id}','EventController@event_category_delete');


});
Route::group(['middleware' => 'web', 'prefix' => 'api/event', 'namespace' => 'Modules\Event\Http\Controllers'], function()
{
    Route::get('/{client_id}','ApiEventController@index');

});
/*
|--------------------------------------------------------------------------
| Eventsetting Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'web','prefix' => 'admin/event','namespace' => 'Modules\Event\Http\Controllers'], function() { 
	Route::group(['prefix' => 'eventsetting'], function() { 
		Route::get('/{event_id}','EventsettingController@index');
		Route::get('/create/{event_id}','EventsettingController@create');
		Route::post('/store/','EventsettingController@store');
		Route::get('/{id}/edit/','EventsettingController@edit');
		Route::post('/update/{id}/','EventsettingController@update');
		Route::get('/delete/{id}','EventsettingController@delete');
	}); 
}); 
/*
|--------------------------------------------------------------------------
| Eventstaff Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'web','prefix' => 'admin/event','namespace' => 'Modules\Event\Http\Controllers'], function() { 
	Route::group(['prefix' => 'eventstaff'], function() { 
		Route::get('/{event_id}','EventstaffController@index');
		Route::get('/create/{event_id}','EventstaffController@create');
		Route::post('/store','EventstaffController@store');
		Route::get('/{id}/edit','EventstaffController@edit');
		Route::get('/{id}','EventstaffController@show');
		Route::post('/update/{id}','EventstaffController@update');
		Route::get('/delete/{id}','EventstaffController@delete');
	}); 
}); 
