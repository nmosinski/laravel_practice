@extends("layout")

@section("content")
	<div>
		<form method="POST" action="/articles">
			@csrf
			<div>
				<input type="text" name="title" id="title" value="{{old('title')}}">
				<label for="title">Title</label>
				@error("title")
				<p>{{$errors->first("title")}}</p>
				@enderror
			</div>
			<div>
				<input type="text" id="excerpt" name="excerpt">
				<label for="excerpt">Excerpt</label>
			</div>
			<div>
				<input type="text" id="body" name="body">
				<label for="body">Body</label>
			</div>
			<div>
				<!--@32 #selectMultiple-->
				<select name = "tags[]" multiple>
					@foreach($tags as $tag)
				<option value = "{{$tag->id}}">{{$tag->name}}</option>
					@endforeach
				</select>
				@error("tags")
				<p class="help is-danger">{{$message}}</p>
				@enderror
			</div>
			<div>
				<button type="submit">Submit</button>
			</div>
		</form>
	</div>
@endsection()