<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Participation;
use App\Models\Stat;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    public function __construct()
    {
        
    }
    //
    public function read(){
        $teams = Team::all(); 
        $parts = Participation::all();  

        return view('add-team', compact('teams', 'parts'));
    }

    public function edit(Team $team){
        


        return view('edit-team', compact('team'));
    }


    public function update(Request $request, Team $team){

        if(request('new-name')){
            $team -> name = request('new-name');
        }; 
        if(request('new-slug')){
            $team -> slug = request('new-slug');
        }; 
        $team -> save(); 

        $newFile = ''; 
        if($request->hasFile('img')){
            $newFile = $request->img->hashName(); 
            $request->img->storeAs('public', $newFile);
        }
        
        return redirect('/');
    }

    public function store(Request $request){

            $newTeam = new Team(); 
            $newTeam -> name = request('new-team'); 
            $newTeam -> slug = request('slug');

            //* Ajout d'image  
            $filePath = ''; 
            if($request->hasFile('img')){
                $newFile = $request->img->hashName(); 
                $filePath = $request->img->storeAs('public', $newFile);
            }
            $newTeam -> file_name = $filePath; 
            $newTeam -> save(); 

            $newStat = new Stat(); 
            $newStat -> team_id = $newTeam->id; 
            $newStat -> save(); 

            $teams = Team::all(); 
            $parts = Participation::all();  



            return view('add-team', compact('teams', 'parts'));
    }
}
