<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Team extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'slug', 
        'file_name'
    ];
    protected $with = [
        //définit les relation qu'on veux égerloder
        'stat'
    ]; 

    public function matches(){
        return $this->belongsToMany(Match::class, 'participations'); 
    }

    public function stat()
    {
        return $this->hasOne('App\Models\Stat');
    }

    public function getTeamPartAttribute()
    {
        return $this->stat->games; 
    }

    public function getTeamPointsAttribute()
    {
        return $this->stat->point;
    }

    public function getTeamWinsAttribute()
    {
        return $this->stat->wins;
    }

    public function getTeamLossesAttribute()
    {
        return $this->stat->losses; 
    }


    public function getTeamGsAttribute()
    {
        return $this->stat->gs;
    }

    public function getTeamGAttribute()
    {
        return $this->stat->goals; 
    }


    
}
