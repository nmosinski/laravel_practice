@extends("layout")

@section("content")
<div id="sidebar">
    <ul class="style1">
        <li class="first">
            <h3>{{$article->title}}</h3>
            <p>{{$article->excerpt}}</p>
        </li>
    </ul>
    <p>
        <!-- @31 #queryurl-->
        @foreach ($article->tags as $tag)
            <a href="/articles?tag={{$tag->name}}" style="color:white">{{$tag->name."Hier ist der Name"}}</a>
        @endforeach
    </p>
    <a href="/articles/">
        <button>Show all</button>
    </a>
    <a href="/articles/{{$article->id}}/edit">
        <button>Edit</button>
    </a>
    <form method="POST" action="/articles/{{$article->id}}">
        @csrf
        @method("DELETE")
        <button type="submit">Delete</button>
    </form>
</div>
@endsection()
