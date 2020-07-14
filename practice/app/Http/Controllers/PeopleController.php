<?php

namespace App\Http\Controllers;
use App\People;

class PeopleController extends Controller
{
	public function show($PATH)
	{
		$person = People::where("name", $PATH)->firstOrFail();
		
		return view("people", ["person" => $person]);
	}
}

?>