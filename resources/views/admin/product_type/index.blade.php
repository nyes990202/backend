@extends('layouts/app')


@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endsection


@section('content')
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">主頁面</a></li>
      <li class="breadcrumb-item active" aria-current="page">商品類別更改</li>
    </ol>
  </nav>

  <a class="btn btn-primary mb-3" href="/admin/product_type/create">新增商品類別</a>


<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>類別</th>


            <th>排序</th>


            <th  width="100">功能</th>




        </tr>
    </thead>




    <tbody>
        @foreach ($product_type as $types)
        <tr>

            <td>{{$types->type_name}}</td>

            <td>{{$types->sort}}</td>



            <td>
            <a class="btn btn-dark" href="/admin/product_type/{{$types->id}}/edit">編輯</a>
            <button class="btn btn-danger btn-del " data-ptid="{{$types->id}}" >刪除</button>
            <form id="delete-form{{$types->id}}" action="/admin/product_type/{{$types->id}}" method="POST" style="display: none;">
                @csrf
                @method("DELETE")
            </form>

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
        var r = confirm('如果刪除類別，旗下產品也都會被刪除!!');
        if(r==true){
        $('#delete-form' + this.dataset.ptid).submit();
        }
    })
} );
</script>

@endsection
