@extends('layouts/app')


@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection


@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">主頁面</a></li>
        <li class="breadcrumb-item"><a href="/admin/product">商品列</a></li>
        <li class="breadcrumb-item active" aria-current="page">商品編輯]</li>
      </ol>
    </nav>


<div class="container">
<form  id="btn-delete" method="POST" enctype="multipart/form-data" action='/admin/product/update/{{$products->id}}'>
    @csrf
    <div class="form-group">
        <label for="name">商品名稱 <small class="text-danger">(限制字數最多20)</small></label>
        <input name="name" type="text" class="form-control" id="name" value="{{$products->name}}" required>
    </div>
    <div class="form-group">
        <label for="price">價錢</label>
        <input name="price" type="text" class="form-control" id="price" value="{{$products->price}}" required>
      </div>

      <select name="type_id" class="form-control">
           @foreach ($product_types as $type_id)

        <option value="{{$type_id->id}}" @if ($type_id->id == $products->type_id) selected @endif>{{$type_id->type_name}}</option>

          @endforeach
      </select>

      <div class="form-group">
        <div for="product_img">原本主要圖片<small class="text-danger">(建議上傳寬高比例4:3)</small></div>
        <img  class="figure" width="100" src="{{$products->product_img}}" alt="">
      </div>
      <div class="form-group">
        <label for="product_img">上傳修改圖片<small class="text-danger">(建議上傳寬高比例6:3)</small></label>
        <input name="product_img" type="file" class="form-control-file" id="product_img">
      </div>

      <div  class="form-group">
          <h6>原多張圖片</h6>
          @foreach ($products->ProductImg as $ProductImgs)

         <img  class="figure" height="100" src="{{$ProductImgs->img_url}}" alt="">

         <button class="btn btn-danger btn-del " data-imgid="{{$ProductImgs->id}}" >X</button>
    {{-- <a class="btn btn-danger  " href="/admin/ajax_delete_img/{{$ProductImgs->id}}">X</a> --}}




          @endforeach
      </div>
      <div class="form-group">
        <label for="multiple_img">上傳多張圖片<small class="text-danger">(建議上傳寬高比例4:3)</small></label>
        <input name="multiple_img[]" type="file" class="form-control-file" id="multiple_img" multiple>
      </div>

      <div class="form-group">
        <label for="date">上架日期</label>
        <input name="date" type="text" class="form-control" id="date" value="{{$products->date}}" required>
      </div>



      <div class="form-group">
        <label for="info">說明</label>
      <textarea name="info" class="form-control" id="info" rows="3" required>{{$products->info}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">建立資料</button>
    </div>


    @endsection


    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-zh-TW.min.js" integrity="sha512-QwmFqNXzMuXrWliMHyf5PZTJBdoq1gsCwUyM6ffVk+4/N+R76EFwLWM/6lszVVD8Zza3xd6v16Nl6ApsqTr+sg==" crossorigin="anonymous"></script>

    <script>


    $('#btn-delete').on('click','.btn-del',function()
    {
        var r = confirm('確定要刪除嗎?');
        if(r==true){
        window.location.href=`admin/ajax_delete_product_imgs/${this.dataset.imgid}`;
        }
    });


    </script>

    <script>


        $(document).ready(function() {
            $('#info').summernote({
                height: 150,
                lang: 'zh-TW',
                callbacks: {
                    onImageUpload: function(files) {
                        for(let i=0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete : function(target) {
                        $.delete(target[0].getAttribute("src"));
                    }
                },
            });


            $.upload = function (file) {
                let out = new FormData();
                out.append('file', file, file.name);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_upload_img',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: out,
                    success: function (img) {
                        $('#info').summernote('insertImage', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            };

            $.delete = function (file_link) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_delete_img',
                    data: {file_link:file_link},
                    success: function (img) {
                        console.log("delete:",img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            }
       });
    </script>


    @endsection
