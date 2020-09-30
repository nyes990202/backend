<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    
    protected $fillable = [
       'id','title', 'sub_title', 'text','img_url'
    ];
}
