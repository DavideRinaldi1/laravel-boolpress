@extends('layouts.app')

@section('content')
    <div class="container">
    <form method="POST" action="{{ route('posts.update', $post['id'] ) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id='title' name="title" value="{{$post['title']}}">
        </div>
        @error('title')
        <div style="color:red">
            {{$message}}           
        </div>  
        @enderror
        <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control" id='author' name="author"value="{{$post['author']}}">
        </div>
        @error('author')
        <div style="color:red">
            {{$message}}           
        </div>  
        @enderror
        <div class="mb-3">
            <label for="descr" class="form-label">Descrizione</label>
            <input type="text" class="form-control" id='descr' name="description" value="{{$post->postInfo->description}}">
        </div>
        @error('description')
        <div style="color:red">
            {{$message}}           
        </div>  
        @enderror
        <label for="category">Scegli una categoria:</label>
        <select name="category_id" id="category_id" class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id='slug' name="slug" value="{{$post->postInfo->slug}}">
        </div>
        @error('slug')
        <div style="color:red">
            {{$message}}           
        </div>  
        @enderror
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 </div>
@endsection
