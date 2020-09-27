<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;
    public $fillable = [
        'natch_id',
        'team_id', 
        'goals',
        'is_home'
    ];

 
}
