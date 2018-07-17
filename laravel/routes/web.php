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

use Illuminate\Http\Request;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Redirect from index page to films page
Route::get('/', function() {
    return redirect('films');
});

// Some requests for which need authorization
Route::group(['middleware' => ['auth']], function() {

    Route::post('/comment/{id_film}', function(Request $request, $id_film) {
        $film = \App\Models\Films::where('id', $id_film)->get()[0];

        $data = [
            'id_user' => Auth::user()->id,
            'id_film' => $id_film,
            'comment' => $request->comment
        ];

        \App\Models\Comments::create($data);
        return redirect('films/' . $film->slug);
    });

    // Add new film to database
    Route::get('/films/create', function() {
        return view('films.create', [
            'genres' => \App\Models\Genres::all()
        ]);
    });

    Route::post('/films/create', function(Request $request) {
        $name = $request->name;

        $data = [
            'name' => $name,
            'slug' => \App\Helpers::slug($name),
            'description' => $request->description,
            'release_date' => $request->release_date,
            'rating' => $request->rating,
            'ticket_price' => $request->ticket_price,
            'country' => $request->country,
            'genres' => json_encode($request->genres),
            'photo' => $request->photo
        ];

        \App\Models\Films::create($data);
        return redirect('films');
    });

});

// Show all films from database
Route::get('/films', function() {
    return view('films.index', [
        'films' => \App\Models\Films::all()
    ]);
});

// Show film page
Route::get('/films/{slug}', function($slug) {
    $film = \App\Models\Films::where('slug', $slug)->get()[0];

    $comments = \App\Models\Comments::where('id_film', $film->id)
        ->join('users', 'users.id', '=', 'comments.id_user')
        ->select('users.name', 'comments.comment')
        ->get();

    return view('films.entry', [
        'film' => $film,
        'comments' => $comments
    ]);
});
