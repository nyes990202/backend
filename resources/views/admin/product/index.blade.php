@extends('layouts/app')


@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endsection


@section('content')
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">主頁面</a></li>
      <li class="breadcrumb-item active" aria-current="page">商品資料更改</li>
    </ol>
  </nav>

  <a class="btn btn-primary mb-3" href="product/create">新增商品資料</a>


<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>名稱</th>
            <th width="100">商品圖片</th>

            <th>價錢</th>
            <th>說明</th>
            <th width="100">圖文</th>
            <th>上架日期</th>
            <th>分類</th>


            <th  width="100">功能</th>




        </tr>
    </thead>




    <tbody>
        @foreach ($news_list as $news)
        <tr>

            <td>{{$news->name}}</td>
            <td><img width="100" src="{{$news->product_img}}" alt=""></td>
            <td>{{$news->price}}</td>
            <td>{{$news->info}}</td>
            <td>{{$news->info_img}}</td>
            <td>{{$news->date}}</td>

            <td>{{$news->product_type->type_name}}</td>



            <td>
            <a class="btn btn-dark" href="product/edit/{{$news->id}}">編輯</a>

            <button class="btn btn-danger btn-del " data-newsid="{{$news->id}}" >刪除</button>


            </td>
        </tr>
         @endforeach

    </tbody>


</table>
</div>





@endsection


@section('js')

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
    $('#example').on('click','.btn-del',function()
    {
        var r = confirm('確定要刪除嗎?');
        if(r==true){
        window.location.href=`product/destroy/${this.dataset.newsid}`;
        }
    })
} );
</script>

@endsection
