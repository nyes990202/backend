<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsType extends Model
{
    protected $table = 'product_type';

    protected $fillable = [
       'type_name','sort'
    ];

    public function product()
    {
        return $this->hasMany('App/Products');
    }
}

