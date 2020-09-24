<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){


        $teams = Teams::all(); 
            

        return view('index', compact('teams'));
    }
}
