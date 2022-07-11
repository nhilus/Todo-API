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
        'release',
        'runtime',
        'director',
        'actor_id',
        'genre_id',
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
