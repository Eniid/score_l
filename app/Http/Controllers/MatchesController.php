<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Participation;
use App\Models\Teams;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    public function store(){

        //Sauvgater les noms 
        $t1 = request('home-team');
        $t2 = request('away-team');
        $slug = substr($t1, 0, 2).substr($t2, 0, 2); 

        $match = new Matches(); 
        $match -> date = request('match-date'); 
        $match -> slug = $slug; 
        $match -> save(); 

        


        $part = new Participation(); 
        $part -> match_id = $match->id; 
        if(request('away-team-unlisted')){
            $newAwayTeam = new Teams(); 
            $newAwayTeam -> name = request('away-team-unlisted'); 
            $newAwayTeam -> slug = substr(request('away-team-unlisted'), 0, 2);
            $newAwayTeam -> save(); 
            $part -> team_id = $newAwayTeam->id; 
        } else {
            $part -> team_id = request('home-team'); 
        }
        $part -> goals = request('home-team-goals'); 
        $part -> is_home = '1';
        $part -> save(); 


        $part2 = new Participation(); 
        $part2 -> match_id = $match->id; 
        $part2 -> team_id = request('away-team'); 
        $part2 -> goals = request('away-team-goals'); 
        $part2 -> is_home = '0'; 
        $part2 -> save(); 


        return view('index');
    }
}
