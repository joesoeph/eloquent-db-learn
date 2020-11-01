<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function otherComments()
    {
        return $this->morphMany('App\OtherComment', 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
