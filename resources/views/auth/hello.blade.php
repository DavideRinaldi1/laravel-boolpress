@extends('layouts.app')

@section('content')
 <div class="container">
     @guest
     <h1 class="text-center">
         Ciao {{$user->name}}
     </h1>     
     @endguest
     <h1 class="text-center">
         Ciao Utente!
     </h1>
 </div>
@endsection
