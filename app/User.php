<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','access_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //user hasMAny notes

    public function notes()
    {
        //  ana geet 3nd el one ya7ty 3la ( has many ) ya3ny kteer menny
        return $this->hasMany('App\Note');
    }

}
