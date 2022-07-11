<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'color',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
