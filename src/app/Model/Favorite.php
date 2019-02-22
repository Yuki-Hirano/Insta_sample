<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $fillable = ['user_name','post_id'];

    public function posts()
      {
        return $this->belongsTo('App\Model\Post');
      }

      public function github_users()
      {
        return $this->belongsTo('App\Model\Github_user');
      }
}
