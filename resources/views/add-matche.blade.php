@extends('layouts.app')

@section('content')

@auth
<br>
<br>
<br>


        @can('add-match')
            <h2>A new game as been playes ? Add it here. </h2>
            <br>

            <form action="/match/create" method="post">
            @csrf
                <label for="match-date">Date</label>
                <input type="date" id="match-date" name="match-date">
                <br>
                <br>
                <label for="home-team">Golden snitch catching team</label>
                <select name="home-team" id="home-team">
                @foreach($teams as $team)
                <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
                </select>
                <br>
                <label for="home-team-goals">Goals</label>
                <input type="text" id="home-team-goals" name="home-team-goals">
                <br>
                <br>
                <label for="request('home-team')">The other team</label>
                <select name="away-team" id="away-team">
                @foreach($teams as $team)
                <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
                </select>
                <br>
                <label for="request('home-team')">Goals</label>
                <input type="text" id="away-team-goals" name="away-team-goals">
                <br>
                <input type="submit" value="Ajouter ce match">
            </form>

            <br>
                <br>

                @can('add-team')
                    <p>The team who played is not here yet ?  <a href="/team">Create a new team</a></p> 
                @endcan
        @endcan
    @endauth

@endsection