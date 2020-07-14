<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Article;
use \App\Tag;

class ArticlesController extends Controller
{
	const PAGINATE_SIZE = 5;

	//@31 #queryurl
	// Render a list of a resource
	public function index()
	{
		if(request("tag"))
		{
			// Fetch the tag with the name in the given request. Get all articles associated with that tag.
			$articles = Tag::where("name", request("tag"))->firstOrFail()->articles;
		}
		else
			$articles = Article::latest()->get();

		return view("articles.index", ["articles" => $articles]);
	}

	// Show a single resource
	public function show(Article $article)
	{	
		return view("articles.show", ["article" => $article]);
	}

	// Show a view to create a new resource
	public function create()
	{
		return view("articles.create", ["tags"=> Tag::all()]);
	}

	// Store/persist a resource
	public function store()
	{
		// @32 #validation #many #array #tags
		$validatedAttributes = request()->validate([
			"title"=>"required",
			"excerpt" => "required",
			"body" => "required",
			"tags" => "exists:tags,id"
		]);
		
		$article = new Article($validatedAttributes);
		$article->user_id = 1;
		$article->save();
		$article->tags()->attach(request("tags"));
		$article->save();


		return redirect(route("articles.show",$article));
	}

	// Show a form to edit an existing resource
	public function edit(Article $article)
	{
		return view("articles.edit", ["article" => $article]);
	}

	// Store/persist the edited resource
	public function update(Article $article)
	{
		$validatedAttributes = request()->validate([
			"title" => "required",
			"excerpt" => "required",
			"body" => "required"
		]);

		$article->update($validatedAttributes);

		return redirect(route("articles.show",$article));
	}

	// Destroy/delete a resource
	public function destroy(Article $article)
	{
		Article::destroy($article->id);
		return redirect("/articles");	
	}
}
