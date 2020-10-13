@extends('layouts/app')



@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">主頁面</a></li>
        <li class="breadcrumb-item"><a href="/admin/product">商品列</a></li>
        <li class="breadcrumb-item active" aria-current="page">商品建立</li>
      </ol>
    </nav>


<div class="container">
<form method="POST" enctype="multipart/form-data" action='/admin/porduct/store'>
    @csrf
    <div class="form-group">
        <label for="name">商品名稱 <small class="text-danger">(限制字數最多20)</small></label>
        <input name="name" type="text" class="form-control" id="name" required>
    </div>
    <div class="form-group">
        <label for="price">價錢</label>
        <input name="price" type="text" class="form-control" id="price" required>
      </div>

      <select name="type_id" class="form-control">
          {{-- @foreach ($products as $type_id)

          <option value=""></option>
          @endforeach --}}


      </select>
      <div class="form-group">
        <label for="product_img">上傳圖片<small class="text-danger">(建議上傳寬高比例4:3)</small></label>
        <input name="product_img" type="file" class="form-control-file" id="product_img" required>
      </div>
      <div class="form-group">
        <label for="info">說明</label>
        <textarea name="info" class="form-control" id="info" rows="3" required></textarea>
      </div>
    <button type="submit" class="btn btn-primary">建立資料</button>
    </div>

    @endsection
