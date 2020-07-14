<?php

use Illuminate\Support\Facades\Route;
use App\Article;

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

/*
Route::get('/{post}', function () {
    return view('welcome');
});
*/

/*
Route::get('/suck_a_dick/{url_param}', function ($url_param) {
	$name = request("name");
	$url_params = ["1" => "I suck it", "2" => "I suck it hard"];


	if(!array_key_exists($url_param, $url_params))
		abort(404, "No dick for you");
	
	return view('routing', ["name"=> $name, "url_param_value" => $url_params[$url_param]]);
	

    //return view('suck_a_dick', ["url_param_value" => $url_params[$url_param]]);
});


Route::get('/suck_a_dick_controller/{url_param}', "RoutingController@show");

*/

//Route::get("/people/{PATH}", "PeopleController@show");
Route::get("/home", function(){return view("home");});

Route::get("/contact", function(){
	$articles = Article::latest()->get();
	return view("contact", ["articles" => $articles]);
});


Route::get("/articles", "ArticlesController@index");
Route::post("/articles", "ArticlesController@store");
Route::get("/articles/create", "ArticlesController@create");
Route::get("/articles/{article}", "ArticlesController@show")->name("articles.show");

Route::get("/articles/{article}/edit", "ArticlesController@edit");
Route::put("/articles/{article}", "ArticlesController@update");

Route::delete("/articles/{article}", "ArticlesController@destroy");