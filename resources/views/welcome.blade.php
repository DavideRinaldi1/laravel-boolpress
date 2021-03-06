@extends ('layouts.app')
@section('content')
<div class="container">
    @auth
        <a class="btn btn-outline-success" href="{{route('posts.create')}}" role="button">Crea un nuovo post</a>
    @endauth
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Autore</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->title}}</th>
                <td>{{$post->category->title}}</td>
                <td>{{$post->author}}</td>
                <td>{{$post->postInfo->description}}</td>
                <td>
                    <a class="btn btn-outline-success" href="{{route('posts.show', $post->id)}}" role="button">Dettagli</a>
                    <a class="btn btn-outline-secondary" href="{{route('posts.edit', $post->id)}}" role="button">Modifica</a>
                    <form action="{{route('posts.destroy' , $post->id)}}" 
                    method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
        
