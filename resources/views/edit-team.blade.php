@extends('layouts.app')

@section('content')

@guest
<p>Vous devez être connecté pour pouvoir voir cette page. </p>
@endguest

@can('add-team')
@auth
    <h1>Edit {{$team -> name}} team</h1>


    <form action="/team/{{$team -> slug}}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('PATCH')
        <label for="new-name">New name</label>
        <input type="text" id="new-name" name="new-name" value="{{$team -> name}}">
        <br>
        <label for="new-slug">New slug</label>
        <input type="text" name="new-slug" id="new-slug" value="{{$team -> slug}}">
        <br>
        <label for="img">Add a picture</label>
        <input type="file" name="img" id="img">
        <br>
        <input type="submit" value="Edit informations">
    </form>
</section>
@endauth
@endcan


@endsection