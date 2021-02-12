@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <h1>Devi aver effettuato l'accesso per svolgere questa azione.</h1>
    </div>
    <div class="row d-flex justify-content-center">
        <a href="{{route('posts.index')}}" class="btn btn-primary" role="btn">Torna alla Home</a>
    </div>
</div>
@endsection