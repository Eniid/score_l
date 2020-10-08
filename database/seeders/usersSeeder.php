<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::created(['name'=>'Enid', 'email' =>'enid-bc@hotmail.com', 'password' => "1234"]); 
        User::created(['name'=>'Céline', 'email' =>'enidbc@gmail.com', 'password' => "1234"]); 
        User::created(['name'=>'Léa', 'email' =>'jaquotlea@aol.fr', 'password' => "1234"]); 

    }
}
