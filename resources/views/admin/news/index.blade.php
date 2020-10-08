@extends('layouts/app')


@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endsection


@section('content')
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">主頁面</a></li>
      <li class="breadcrumb-item active" aria-current="page">資料更改</li>
    </ol>
  </nav>

  <a class="btn btn-primary mb-3" href="news/create">新增資料</a>


<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>標題</th>
            <th>副標題</th>
            <th>內容</th>
            <th width="100">圖片</th>
            <td>created_at</td>
            <th  width="100">功能</th>


        </tr>
    </thead>




    <tbody>
        @foreach ($news_list as $news)
        <tr>
            <td>{{$news->title}}</td>

            <td>{{$news->sub_title}}</td>
            <td>{{$news->text}}</td>
            <td><img width="100" src="{{$news->img_url}}" alt=""></td>
            <td>{{$news->created_at}}</td>
            <td>
            <a class="btn btn-dark" href="news/edit/{{$news->id}}">編輯</a>
            <a class="btn btn-danger" href="news/destory/{{$news->id}}">刪除</a>
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
} );
</script>

@endsection
