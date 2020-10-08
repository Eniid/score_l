@extends('layouts.app')

@section('content')
@can('add-team')
@auth
<br>
    <h1>Add a new house to the cup</h1>

    <aside>
        <h2>Current houses</h2>
        <ul>
        @foreach($teams as $team)
            <li><img src="{{asset('/storage/'.$team -> file_name)}}" alt=""> {{$team -> name}} - {{$team -> slug}}</li>
            @endforeach
        </ul>
        <a href="/matche">Add a game</a>
    </aside>
    <br><br>

    <form action="/team/create" method="post" enctype="multipart/form-data">
    @csrf
        <label for="new-team">Team name</label>
        <input type="text" id="new-team" name="new-team">
        <br>
        <label for="slug">Team Slug</label>
        <input type="text" name="slug" id="slug">
        <br>
        <label for="img">Add a picture</label>
        <input type="file" name="img" id="img">
        <br>
        <input type="submit" value="Ajouter ce match">
    </form>
</section>
@endauth
@endcan


@endsection