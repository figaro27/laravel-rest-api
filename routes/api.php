<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');

Route::middleware('auth:api')->group( function () {
    Route::get('blogs', 'API\BlogController@index');
    Route::post('storeBlog', 'API\BlogController@store');
    Route::put('updateBlog/{id}', 'API\BlogController@update');
    Route::get('showBlog/{id}', 'API\BlogController@show');
    Route::delete('deleteBlog/{id}', 'API\BlogController@destroy');

    Route::post('person', 'API\PersonController@create');
    Route::put('person/{id}', 'API\PersonController@update');

    Route::get('addresstype', 'API\AddressController@getAddressType');
    Route::post('address', 'API\AddressController@create');
    Route::put('address/{id}', 'API\AddressController@update');

    Route::get('phonetype', 'API\PhoneController@getPhoneType');
    Route::post('phone', 'API\PhoneController@save');
    Route::put('phone/{id}', 'API\PhoneController@update');

    Route::post('lead', 'API\LeadController@create');
    Route::post('lead/search', 'API\LeadController@search');

    Route::post('leaddetail', 'API\LeadDetailController@create');
    Route::put('leaddetail/{id}', 'API\LeadDetailController@update');

    Route::post('color', 'API\ColorController@create');
    Route::put('color/{id}', 'API\ColorController@update');

    Route::post('ingredient', 'API\IngredientController@create');
    Route::put('ingredient/{id}', 'API\IngredientController@update');

    Route::get('mail', 'API\MailController@mail');

    Route::post('logout', 'API\RegisterController@logout');
});
