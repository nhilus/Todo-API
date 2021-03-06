<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'year',
        'released',
        'runtime',
        'director',
        'imdb_votes',
    ];

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }

}
