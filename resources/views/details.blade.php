@extends('layouts.app')
@section('content')
<div class="container text-center d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"> <strong>Titolo:</strong><br>{{$post->title}}</h5>
            <p class="card-text"><strong>Autore:</strong><br>{{$post->author}}</p>
            <p class="card-text"><strong>Descrizione:</strong><br>{{$post->postInfo->description}}</p>
            <p class="card-text"><strong>Slug:</strong><br>{{$post->postInfo->slug}}</p>
            <p class="card-text"><strong>Categoria:</strong><br>{{$post->category->title}}</p>
            @foreach($post->tags as $tag)
            <p class="card-text"><strong>Tags:</strong><br>{{$tag->tag}}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection