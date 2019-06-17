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


Route::middleware('api')->get('/Forms/all','FormsController@index');
Route::middleware('api')->get('/Forms/{form}', 'FormsController@show');
Route::middleware('api')->post('/Forms/addTemplate/{form}','FormsController@addTemplate');
Route::middleware('api')->post('/Forms/store', 'FormsController@store');
Route::middleware('api')->post('/Forms/edit/{new_form}','FormsController@update');
Route::middleware('api')->delete('/Forms/{form}/delete', 'FormsController@destroy');
// Route::middleware('api')->post('/Forms/{form}/update', 'FormsController@update');
Route::middleware('api')->post('/Forms/pdf/{form}', 'PdfGenerateController@pdfview');
Route::middleware('api')->post('/Forms/SavePdf/{form}', 'PdfGenerateController@pdfStore');
