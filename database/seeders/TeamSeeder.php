<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Team::create(['name'=>'Ravenclaw', 'slug'=>'R']); 
        Team::create(['name'=>'Slytherin', 'slug'=>'S']); 
        Team::create(['name'=>'Hufflepuff', 'slug'=>'H']); 
        Team::create(['name'=>'Gryffindor', 'slug'=>'G']); 
    }
}
