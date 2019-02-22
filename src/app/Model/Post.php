<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Favorite;

class Post extends Model
{
    //
    protected $fillable = ['user_name','image_path'];

    public function user()
    {
      return $this->belongsTo('App\Model\Github_user');
    }

    public function favorites()
    {
      return $this->hasMany('App\Model\Favorite');
    }

}
