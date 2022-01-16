<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    $links = \App\Link::all();

    return view('welcome', ['links' => $links]); //here 'links' is the key and $links is the value/data
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/submit', function (){
    return view('submit');
});

Route::post('/submit', function (Request $request){ //Illuminate\Http\Request holds the POST data
    $data = $request->validate(([ //validates the form
        'title' => 'required|max:225', // with | we can define multiple rules
        'url' => 'required|url|max:225',
        'description'=> 'required|max:225',

    ]));

    $link = tap(new App\Link($data))->save(); //use data to populate the form. tap creates new Link model instance and saves AND returns it

    return redirect('/');

});
