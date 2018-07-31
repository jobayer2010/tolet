<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToletImage extends Model
{
    public function tolet()
    {
        return $this->belongsTo('App\Tolet');
    }
}
