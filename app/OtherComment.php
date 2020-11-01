<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherComment extends Model
{
    public function commentable()
    {
        return $this->morphTo();
    }
}
