<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable=[
        'name','desc','image' ,
    ];

    //book belongsToMany Categories

   public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
