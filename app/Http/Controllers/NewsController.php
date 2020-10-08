<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_list = DB::table('news')->orderBy('id','desc')->get();
        return view('admin/news/index',compact('news_list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/news/create');
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


        //第一種上傳方式
        // $file_name = $request->file('img_url')->store('','public');
        // $requestData['img_url'] = $file_name;

         News::create($requestData);




    //    $new_news= new News();
    //    $new_news->title = $request->title;
    //    $new_news->sub_title = $request->sub_title;
    //    $new_news->text = $request->text;
    //    $new_news->img_url = '';
    //    $new_news->save();

       return redirect('admin/news');

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
        $news=News::find($id);
        return view('admin.news.edit',compact('news'));

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
        $item = News::find($id);
        $requestData = $request->all();


        if($request->hasFile('img_url')) {
            $old_image = $item->img_url;
            $file = $request->file('img_url');
            $path = $this->fileUpload($file,'news');
            $requestData['img_url'] = $path;
            File::delete(public_path().$old_image);
        }

        $item->update($requestData);
        return redirect('admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        $item = News::find($id);
        $old_image = $item->img_url;
        if(file_exists(public_path().$old_image)){
        File::delete(public_path().$old_image);
        }
        $item->delete();

        return redirect('admin/news');
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
