<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','title', 'sub_title', 'text','img_url'
    ];
}
