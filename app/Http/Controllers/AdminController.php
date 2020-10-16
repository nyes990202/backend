<?php

namespace App\Http\Controllers;

use App\ProductImgs;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function ajax_upload_img()
    {
        // A list of permitted file extensions
        $allowed = array('png', 'jpg', 'gif','zip');
        if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if(!in_array(strtolower($extension), $allowed)){
                echo '{"status":"error"}';
                exit;
            }
            $name = strval(time().md5(rand(100, 200)));
            $ext = explode('.', $_FILES['file']['name']);
            $filename = $name . '.' . $ext[1];
            //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
            if( ! is_dir('upload/')){
                mkdir('upload/');
            }
            //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
            if ( ! is_dir('upload/img')) {
                mkdir('upload/img');
            }
            $destination = public_path().'/upload/img/'. $filename; //change this directory
            $location = $_FILES["file"]["tmp_name"];
            move_uploaded_file($location, $destination);
            echo "/upload/img/".$filename;//change this URL
        }
        exit;
    }

    public function ajax_delete_img(Request $request){
        if(file_exists(public_path().$request->file_link)){
            File::delete(public_path().$request->file_link);
        }
    }

    //多張圖刪除單張
    // public function ajax_delete_product_imgs(Request $request)
    //     {
    //         $product_id = $request->product_id;

    //         //多張圖片組的單一圖片刪除
    //         $product_img = ProductImgs::where('id',$product_id)->first();
    //         $old_product_img = $product_img->img;
    //         if(file_exists(public_path().$old_product_img)){
    //             File::delete(public_path().$old_product_img);
    //         }
    //         $product_img->delete();
    //         // echo '{"status":"success","message":"delete file success"}';
    //     }

    public function ajax_delete_product_imgs($id)
    {
        $item = ProductImgs::find($id);
        dd($item);
        $old_image = $item->product_img;
        if(file_exists(public_path().$old_image)){
        File::delete(public_path().$old_image);
        }
        $item->delete();
    }

}
