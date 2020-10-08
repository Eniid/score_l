<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;
    public $fillable = [
        'team_id',
        'games',
        'point',
        'wins',
        'losses',
        'gs',
        'goals',
    ];


}
