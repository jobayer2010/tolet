<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tolet extends Model
{
    //
    public function postedUsers()
    {
        return $this->belongsTo('App\User');
    }

    public function image()
    {
        return $this->hasMany('App\ToletImage');
    }

    public function bookmarkedUsers()
    {
        return $this->belongsToMany(User::class);
    }
}
