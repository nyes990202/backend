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


<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>標題</th>
            <th>副標題</th>
            <th>圖片網址</th>
            <th>功能</th>

        </tr>
    </thead>




    <tbody>
        @foreach ($news_list as $news)
        <tr>
            <td>{{$news->title}}</td>
            <td>{{$news->sub_title}}</td>
            <td><img width="150px" src="{{$news->img_url}}" alt=""></td>
            <td>
                <a class="btn btn-light" href="">編輯</a>
                <a class="btn btn-dark" href="">刪除</a>
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
