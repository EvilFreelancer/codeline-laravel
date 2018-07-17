<?php

use Illuminate\Http\Request;
Use App\Models\Films;

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

Route::get('films', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Films::all();
});

Route::get('films/{id}', function($id) {
    return Films::find($id);
});

Route::post('films', function(Request $request) {
    return Films::create($request->all);
});

Route::put('films/{id}', function(Request $request, $id) {
    $article = Films::findOrFail($id);
    $article->update($request->all());
    return $article;
});

Route::delete('films/{id}', function($id) {
    Films::find($id)->delete();
    return 204;
});
