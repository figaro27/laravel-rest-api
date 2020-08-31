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
    Route::post('phone', 'API\PhoneController@create');
    Route::put('phone/{id}', 'API\PhoneController@update');

    Route::post('lead', 'API\LeadController@create');
    Route::get('leads', 'API\LeadController@list');
    Route::get('lead/{id}', 'API\LeadController@show');
    Route::delete('lead/{id}', 'API\LeadController@destroy');

    Route::post('leaddetail', 'API\LeadDetailController@create');
    Route::put('leaddetail/{id}', 'API\LeadDetailController@update');

    Route::post('project', 'API\ProjectController@create');
    Route::get('projects', 'API\ProjectController@list');
    Route::put('project/{id}', 'API\ProjectController@update');

    Route::post('projectdetail', 'API\ProjectDetailController@create');

    Route::post('project/note', 'API\ProjectNoteController@create');
    Route::get('project/note/list/{projectid}', 'API\ProjectNoteController@list');
    Route::put('project/note/{id}', 'API\ProjectNoteController@update');
    Route::delete('project/note/{id}', 'API\ProjectNoteController@destroy');

    Route::post('project/image', 'API\ProjectImageController@create');
    Route::get('project/image/list/{projectid}', 'API\ProjectImageController@list');
    Route::put('project/image/{id}', 'API\ProjectImageController@update');
    Route::delete('project/image/{id}', 'API\ProjectImageController@destroy');


    Route::post('color', 'API\ColorController@create');
    Route::put('color/{id}', 'API\ColorController@update');
    Route::delete('color/{id}', 'API\ColorController@destroy');
    Route::get('colors', 'API\ColorController@list');

    Route::post('pattern', 'API\PatternController@create');
    Route::put('pattern/{id}', 'API\PatternController@update');
    Route::delete('pattern/{id}', 'API\PatternController@destroy');
    Route::get('patterns', 'API\PatternController@list');

    Route::post('ingredient', 'API\IngredientController@create');
    Route::get('ingredient/{id}', 'API\IngredientController@show');
    Route::put('ingredient/{id}', 'API\IngredientController@update');
    Route::delete('ingredient/{id}', 'API\IngredientController@destroy');
    Route::get('ingredients', 'API\IngredientController@list');

    Route::post('system', 'API\SystemController@create');
    Route::put('system/{id}', 'API\SystemController@update');
    Route::get('system/{id}', 'API\SystemController@show');
    Route::delete('system/{id}', 'API\SystemController@destroy');
    Route::get('systems', 'API\SystemController@list');

    Route::post('contracttemplate', 'API\ContractTemplateController@create');
    Route::put('contracttemplate/{id}', 'API\ContractTemplateController@update');
    Route::get('contracttemplate/{id}', 'API\ContractTemplateController@show');
    Route::delete('contracttemplate/{id}', 'API\ContractTemplateController@destroy');
    Route::get('contracttemplates', 'API\ContractTemplateController@list');

    Route::post('note', 'API\NoteController@create');
    Route::post('note/{id}', 'API\NoteController@update');

    Route::post('logout', 'API\RegisterController@logout');
});