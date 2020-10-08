<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    public $fillable = [
        'date',
        'slug', 
    ];

    public function teams(){
        return $this->belongsToMany(Team::class, 'participations')->withPivot('goals', 'catched_gs');  
    }

    public function getHomeTeamNameAttribute()
    {
        return $this->teams->filter(function ($team){
            return $team->pivot->catched_gs === 1; 
        })->first()->name;
    }

    public function getAwayTeamNameAttribute()
    {
        return $this->teams->filter(function ($team){
            return $team->pivot->catched_gs === 0; 
        })->first()->name;
    }

    public function getAwayTeamGoalAttribute()
    {
        return $this->teams->filter(function ($team){
            return $team->pivot->catched_gs === 0; 
        })->first()->pivot->goals;
    }

    public function getHomeTeamGoalAttribute()
    {
        return $this->teams->filter(function ($team){
            return $team->pivot->catched_gs === 1; 
        })->first()->pivot->goals;
    }
    public function getDateFormatAttribute()
    {
        $date = $this->date;
        return $date;
    }

}
