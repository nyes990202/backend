<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImgs extends Model
{
    protected $table = 'product_imgs';

    protected $fillable = [
       'product_id','sort','img_url'
    ];

  
}
