<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Participation;
use App\Models\Teams;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $teams = Teams::all(); 
        $parts = Participation::all();  

        return view('index', compact('teams', 'parts'));
    }

}
