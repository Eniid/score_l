<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Participation;
use App\Models\Team;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){
        $teams = Team::with('matches', 'stat')->get(); 
        $sortKey = request()->query('s');
        $teams = $teams->sortBy($sortKey); 


        $parts = Participation::all();  
        $matchs = Match::with('teams')->get(); 

        return view('index', compact('teams', 'parts', 'matchs'));
    }
}
