@extends("layout")

@section("content")
	<div>
		<form method="POST" action="/articles/{{$article->id}}">
		 	@csrf
		 	@method("PUT")
			<div>
				<input type="text" name="title" id="title" value="{{$article->title}}">
				<label for="title">Title</label>
			</div>
			<div>
				<input type="text" id="excerpt" name="excerpt" value="{{$article->excerpt}}">
				<label for="excerpt">Excerpt</label>
			</div>
			<div>
				<input type="text" id="body" name="body" value="{{$article->body}}">
				<label for="body">Body</label>
			</div>
			<div>
				<button type="submit">Submit</button>
			</div>
		</form>
	</div>
@endsection()