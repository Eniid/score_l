@extends('layouts.app')

@section('content')
    
<h1>Premier League 2020</h1>

<x-standings :data='$teams'></x-standings>

<section>
    <h2>Games played at april 2nd, 2020</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th><th>Home Team</th><th>Home Team Goals</th><th>Away Team Goals</th><th>Away Team</th>
            </tr>
        </thead>
        <tbody>

            
            @foreach($parts as $part)
            <tr>
                <td>January 7th, 2020</td>
                <td>Liverpool</td>
                <td>7</td>
                <td>2</td>
                <td>Manchester United</td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</section>
@auth
<section>
    <h2>Encodage d’un nouveau match</h2>



    <form action="/" method="post">
    @csrf
        <label for="match-date">Date du match</label>
        <input type="text" id="match-date" name="match-date">
        <br>
        <label for="home-team">Équipe à domicile</label>
        <select name="home-team" id="home-team">
        @foreach($teams as $team)
        <option value="{{$team->id}}">{{$team->name}}</option>
        @endforeach
            
        </select>
        <label for="home-team-unlisted">Équipe non listée&nbsp;?</label>
        <input type="text" name="home-team-unlisted" id="home-team-unlisted">
        <br>
        <label for="home-team-goals">Goals de l’équipe à domicile</label>
        <input type="text" id="home-team-goals" name="home-team-goals">
        <br>
        <label for="request('home-team')">Équipe visiteuse</label>
        <select name="away-team" id="away-team">
        @foreach($teams as $team)
        <option value="{{$team->id}}">{{$team->name}}</option>
        @endforeach
        </select>
        <label for="away-team-unlisted">Équipe non listée&nbsp;?</label>
        <input type="text" name="away-team-unlisted" id="away-team-unlisted">
        <br>
        <label for="request('home-team')">Goals de l’équipe visiteuse</label>
        <input type="text" id="away-team-goals" name="away-team-goals">
        <br>
        <input type="submit" value="Ajouter ce match">
    </form>
</section>
@endauth

@endsection