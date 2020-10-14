@extends('layouts/app')



@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">主頁面</a></li>
        <li class="breadcrumb-item"><a href="/admin/product_type">商品列</a></li>
        <li class="breadcrumb-item active" aria-current="page">商品建立</li>
      </ol>
    </nav>


<div class="container">
<form method="POST" enctype="multipart/form-data" action='/admin/product_type'>
    @csrf

    <div class="form-group">
        <label for="type_name">類別名稱 <small class="text-danger">(限制字數最多20)</small></label>
        <input name="type_name" type="text" class="form-control" id="type_name" required>
    </div>

    <div class="form-group">
        <label for="sort" >排序</label>
        <input name="sort" type="number" min="0" step="1" class="form-control" id="sort" required>
      </div>

      <button type="submit" class="btn btn-primary">建立類別</button>





    @endsection
