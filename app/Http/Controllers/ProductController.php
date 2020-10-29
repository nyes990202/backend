<?php

namespace App\Http\Controllers;


use App\ProductImgs;
use App\Products;
use App\ProductsType;

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

        // $files = $request->file('multiple_img');
        // dd($files);

        $requestData = $request->all();

        if($request->hasFile('product_img')) {
            $file = $request->file('product_img');
            $path = $this->fileUpload($file,'products');
            $requestData['product_img'] = $path;
        }

       $product = Products::create($requestData);

        //取得剛剛建立資料的ID
        $product_id = $product->id;

        //多圖上傳
        if($request->hasFile('multiple_img')) {
            $flies = $request->file('multiple_img');
            foreach($flies as $file){
                $path = $this->fileUpload($file,'products');
                ProductImgs::create([
                    'img_url' => $path,

                    'product_id' => $product_id,
                ]);
            }
        }

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

        $product_types = ProductsType::with('products')->get();
        $product_imgs = Products::where('id',$id)->with('ProductImg')->first();

        $products=Products::find($id);

        return view('admin.product.edit',compact('products','product_types'));
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
        // $item = Products::find($id);

        // $requestData = $request->all();
        // //單張圖片上傳
        // if($request->hasFile('product_img')) {
        //     $old_image = $item->product_img;
        //     $file = $request->file('product_img');
        //     $path = $this->fileUpload($file,'products');
        //     $requestData['product_img'] = $path;
        //     File::delete(public_path().$old_image);
        // }

        $item = Products::find($id);

        $requestData = $request->all();

        //單張圖片上傳
        if($request->hasFile('product_img','multiple_img')) {
            $old_image = $item->product_img;
            $file = $request->file('product_img');
            $path = $this->fileUpload($file,'products');
            $requestData['product_img'] = $path;
            File::delete(public_path().$old_image);

        }
          //多圖上傳
          if($request->hasFile('multiple_img')) {
              $flies = $request->file('multiple_img');
              foreach($flies as $file){
                  $path = $this->fileUpload($file,'products');
                  ProductImgs::create([
                      'img_url' => $path,

                      'product_id' => $id,
                  ]);
              }
          }

        $item->update($requestData);

        // return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Products::find($id);
        $old_image = $item->product_img;
        if(file_exists(public_path().$old_image)){
        File::delete(public_path().$old_image);
        }
        $item->delete();

         //多張圖片的刪除
         $product_imgs = ProductImgs::where('product_id',$id)->get();
         foreach($product_imgs as $product_img){
             $old_product_img = $product_img->img;
             if(file_exists(public_path().$old_product_img)){
                 File::delete(public_path().$old_product_img);
             }

             $product_img->delete();

            }

        return redirect('admin/product');
    }

    private function fileUpload($file,$dir){
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if( ! is_dir('upload/')){
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if ( ! is_dir('upload/'.$dir)) {
            mkdir('upload/'.$dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time().md5(rand(100, 200))).'.'.$extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path().'/upload/'.$dir.'/'.$filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/'.$dir.'/'.$filename;
    }


}
