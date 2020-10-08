<?php

namespace Database\Seeders;

use App\Models\Stat;
use App\Models\Team;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $teams = Team::all(); 

        foreach ($teams as $team){
            Stat::create(['team_id'=>$team->id]); 
        }
    }
}
