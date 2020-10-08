<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Participation;
use App\Models\Stat;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function read(){
        $teams = Team::all(); 
        $parts = Participation::all();  

        return view('add-matche', compact('teams', 'parts'));
    }

    public function store(){

        //Sauvgater les noms 
        $t1 = request('home-team');
        $t2 = request('away-team');
        $slug = substr($t1, 0, 2).substr($t2, 0, 2); 

        $match = new Match(); 
        $match -> date = request('match-date'); 
        $match -> slug = $slug; 
        $match -> save(); 


        $part = new Participation(); 
        $part -> match_id = $match->id; 
        $part -> team_id = request('home-team'); 
        $part -> goals = request('home-team-goals'); 
        $part -> catched_gs = '1';
        $part -> save(); 


        $part2 = new Participation(); 
        $part2 -> match_id = $match->id; 
        $part2 -> team_id = request('away-team'); 
        $part2 -> goals = request('away-team-goals'); 
        $part2 -> catched_gs = '0'; 
        $part2 -> save(); 

        //* Statistiques générales pour l'équipe qui a attrapé le GS
        $stat1 = Stat::where('team_id', request('home-team'))->first();
        $stat1 -> games = $stat1 -> games +1; 
        $stat1 -> point = $stat1 -> point +150 + (request('home-team-goals') * 10); 
        $stat1 -> gs = $stat1 -> gs + 1; 
        $stat1 -> goals = $stat1 -> goals + request('home-team-goals'); 
        

        //! Statistiques générales pour l'équipe qui n'a pas attrapé le GS
        $stat2 = Stat::where('team_id', request('away-team'))->first();
        $stat2 -> games = $stat2 -> games +1; 
        $stat2 -> point = $stat2 -> point + (request('away-team-goals') * 10); 
        $stat2 -> goals = $stat2 -> goals + request('away-team-goals'); 
        

        //? Stat combinées
        if($stat2 -> point > $stat1 -> point){
            $stat2 -> wins = $stat2 -> wins + 1; 
            $stat1 -> losses = $stat1 -> losses + 1; 
        } else {
            $stat1 -> wins = $stat1 -> wins + 1; 
            $stat2 -> losses = $stat2 -> losses + 1; 
        }


        $stat1 -> save(); 
        $stat2 -> save(); 




        $teams = Team::all(); 
        $matchs = Match::all(); 
        $parts = Participation::all();  

        return view('index', compact('teams', 'parts', 'matchs'));
    }
}
