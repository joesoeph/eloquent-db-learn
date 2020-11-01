<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function otherComments()
    {
        return $this->morphMany('App\OtherComment', 'commentable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
