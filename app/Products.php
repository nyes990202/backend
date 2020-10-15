<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
       'name','product_img', 'price', 'info','info_img','date','type_id'
    ];

    public function product_type()
    {
        return $this->belongsTo('App\ProductsType','type_id');
    }

    public function ProductImg()
    {
        return $this->hasMany('App\ProductImgs','product_id');
    }


}

