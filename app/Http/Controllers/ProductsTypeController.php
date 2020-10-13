<?php
namespace App\Http\Controllers;
use App\Products;
use App\ProductsType;



use Illuminate\Http\Request;

class ProductsTypeController extends Controller
{
    public function index($type_id)
    {
        $products = Products::find($type_id)->products;
    }
}
