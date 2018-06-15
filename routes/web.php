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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home',[
	'as' => 'home',
	'uses' => 'UserController@home',
	]);

Route::get('user',[
	'as' => 'user',
	'uses' => 'UserController@user',
	]);

Route::get('landing_user',[
	'as' => 'landing_user',
	'uses' => 'UserController@landing_user',
	]);

Route::get('user_create', [
	'as' => 'user_create',
	'uses' => 'UserController@user_create',
	]);

Route::post('user_create_process', [
	'as' => 'user_create_process',
	'uses' => 'UserController@user_create_process',
	]);

Route::get('user_index',[
	'as' => 'user_index',
	'uses' => 'UserController@user_index',
	]);

Route::get('user_show',[
	'as' => 'user_show',
	'uses' => 'UserController@user_show',
	]);

Route::get('user_edit',[
	'as' => 'user_edit',
	'uses' => 'UserController@user_edit',
	]);

Route::post('user_edit_process',[
	'as' => 'user_edit_process',
	'uses' => 'UserController@user_edit_process',
	]);

Route::get('user_delete',[
	'as' => 'user_delete',
	'uses' => 'UserController@user_delete',
	]);

Route::get('species_create',[
	'as' => 'species_create',
	'uses' => 'SpeciesController@species_create',
	]);

Route::post('species_create_process', [
	'as' => 'species_create_process',
	'uses' => 'SpeciesController@species_create_process',
	]);

Route::get('species_index',[
	'as' => 'species_index',
	'uses' => 'SpeciesController@species_index',
	]);

Route::get('species_show',[
	'as' => 'species_show',
	'uses' => 'SpeciesController@species_show',
	]);

Route::get('species_edit',[
	'as' => 'species_edit',
	'uses' => 'SpeciesController@species_edit',
	]);

Route::post('species_edit_process',[
	'as' => 'species_edit_process',
	'uses' => 'SpeciesController@species_edit_process',
	]);

Route::get('species_delete',[
	'as' => 'species_delete',
	'uses' => 'SpeciesController@species_delete',
	]);

Route::get('graph',[
	'as' => 'graph',
	'uses' => 'UserController@graph',
	]);

Route::get('graph_class',[
	'as' => 'graph_class',
	'uses' => 'UserController@graph_class',
	]);

Route::get('graph_family',[
	'as' => 'graph_family',
	'uses' => 'UserController@graph_family',
	]);

Route::get('graph_genus',[
	'as' => 'graph_genus',
	'uses' => 'UserController@graph_genus',
	]);

Route::get('graph_size',[
	'as' => 'graph_size',
	'uses' => 'UserController@graph_size',
	]);

Route::get('graph_habitat',[
	'as' => 'graph_habitat',
	'uses' => 'UserController@graph_habitat',
	]);

Route::get('species_scientific_name',[
	'as' => 'species_scientific_name',
	'uses' => 'SpeciesController@species_scientific_name',
	]);

Route::get('species_display_info/{id}',[
	'as' => 'species_display_info',
	'uses' => 'SpeciesController@species_display_info',
	]);

Route::get('species_classification_display_species/{classification}',[
	'as' => 'species_classification_display_species',
	'uses' => 'SpeciesController@species_classification_display_species',
	]);

Route::get('species_classification',[
	'as' => 'species_classification',
	'uses' => 'SpeciesController@species_classification',
	]);

Route::post('species_dropdown_display_species',[
	'as' => 'species_dropdown_display_species',
	'uses' => 'SpeciesController@species_dropdown_display_species',
	]);

Route::get('statistics_classification',[
	'as' => 'statistics_classification',
	'uses' => 'SpeciesController@statistics_classification',
	]);

/*image*/ 
Route::get('image-upload','ImageController@imageUpload');
Route::post('image-upload','ImageController@imageUploadPost');