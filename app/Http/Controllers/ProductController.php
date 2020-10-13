<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_list = Products::with('product_type')->get();
        return view('admin.product.index',compact('news_list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_type = DB::table('product_type')->orderBy("id","asc")->get();

        return view('admin/product/create',compact('product_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $path = $this->fileUpload($file,'news');
            $requestData['img_url'] = $path;
        }
        Products::create($requestData);

       return redirect('admin/product');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=Products::find($id);
        return view('admin.product.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Products::find($id);
        $requestData = $request->all();


        if($request->hasFile('img_url')) {
            $old_image = $item->img_url;
            $file = $request->file('img_url');
            $path = $this->fileUpload($file,'products');
            $requestData['img_url'] = $path;
            File::delete(public_path().$old_image);
        }

        $item->update($requestData);
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
