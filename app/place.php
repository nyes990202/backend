<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class place extends Model
{
    protected $table = 'place';

    protected $fillable = [
       'email','place', 'img_url', 'place_name','place_text'
    ];
}
