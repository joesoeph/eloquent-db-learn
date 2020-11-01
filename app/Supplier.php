<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    public function userHistory()
    {
        // The first argument passed to the hasOneThrough method is the name of the final model we wish to access,
        // The second argument is the name of the intermediate model.
        return $this->hasOneThrough('App\History', 'App\User');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
