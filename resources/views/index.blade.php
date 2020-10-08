@extends('layouts.app')

@section('content')
    

<br><br>
<x-standings :data='$teams'></x-standings>
<br><br>
<section>
    <h2>Played Games</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th><th>House 1</th><th>Points</th><th>Points</th><th>House2</th>
            </tr>
        </thead>
        <tbody>

            
            @foreach($matchs as $match)
            <tr>
                <td>{{$match->date_format}}</td>
                <td>{{$match->home_team_name}}</td>
                <td>{{$match->home_team_goal*10+150}}</td>
                <td>{{$match->away_team_goal*10}}</td>
                <td>{{$match->away_team_name}}</td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</section>
@auth
<br><br>
    @can('add-match')
    <a href="/match/create">Add a game</a><br>
    @endcan
    @can('add-team')
    <a href="/team/create">Create new team</a>
    @endcan
@endauth

@endsection