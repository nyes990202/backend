<?php

namespace App\Http\Controllers;

use App\place;
use App\Products;
use App\ProductsType;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {
        $news_list = DB::table('news')-> orderBy('id','desc')-> take(3) ->get();
        return view('font/index',['news_list' => $news_list]);
    }




    public function news()
    {
        $news_list = DB::table('news')->orderBy('id','desc')->paginate(6);

        return view('font/news',compact('news_list'));
    }

    public function news_info($news_id)
    {
        $news_list = DB::table('news')->where('id','=',$news_id)->first();
        return view('font/news_info',compact('news_list'));
    }

    public function contact_us()
    {
        return view('font/contact_us');
    }

    public function products()
    {
        $product_types = ProductsType::with('products')->get();
        // dd($product_types);

        return view('font/products',compact('product_types'));
    }

    public function products_type($type_id)
    {
        $product_type = ProductsType::find($type_id);
        $products = $product_type ->products;

        return view('font.product_type',compact('product_type','products'));
    }

    public function products_info($product_id)
    {
        $product = Products::find($product_id);
        // dd($product_types);

        return view('font/products_info',compact('product'));
    }

    public function store_contact(Request $request)
    {
    //    dd($request->all());

    // DB::table('place')->insert(
    //     ['email' => $request->email,
    //     'place' => $request->place,
    //     'img_url'=> '',
    //     'place_name' =>$request->place_name,
    //     'place_text' =>$request->place_text

    //     ]

    // );

    Place::create($request->all());

    return '成功';


    }
}
