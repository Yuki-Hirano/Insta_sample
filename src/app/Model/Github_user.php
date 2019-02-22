<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Github_user extends Model
{
    //
    protected $fillable = ['github_id'];

    public function favorites()
    {
      return $this->hasMany('App\Model\Favorite');
    }

    public function posts()
    {
      return $this->hasMany('App\Model\Post');
    }
}
