<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'banner', 'title', 'text',
    ];

    public static function findOrFail(int $id)
    {
    }


}
