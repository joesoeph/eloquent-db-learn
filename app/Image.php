<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    public function imageable()
    {
        return $this->morphTo();
        // return Image::query()
        //             ->with(['imageable' => function (MorphTo $morphTo) {
        //                 $morphTo->morphWith([
        //                     Post::class,
        //                     User::class,
        //                 ]);
        //             }])->get();
    }
}
