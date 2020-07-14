<?php

namespace App\Http\Controllers;
 

 /**
 	Routing Tutorial
class DickController
{
	function show($url_param)
	{
		$name = request("name");
		$url_params = ["1" => "I suck it", "2" => "I suck it hard"];

		if(array_key_exists($url_param, $url_params))
			return view('routing', ["name"=> $name, "url_param_value" => $url_params[$url_param]]);
		else
			abort(404, "No dick for you");
    //return view('routing', ["url_param_value" => $url_params[$url_param]]);
	}
}
*/
?>