@extends('layouts/app')



@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">主頁面</a></li>
        <li class="breadcrumb-item"><a href="/admin/test">資料列</a></li>
        <li class="breadcrumb-item active" aria-current="page">資料編輯</li>
      </ol>
    </nav>


<div class="container">
<form method="POST" enctype="multipart/form-data" action='/admin/test/update/{{$test->id}}'>
    @csrf
    <div class="form-group">
        <label for="title">標題 <small class="text-danger">(限制字數最多20)</small></label>
        <input name="title" type="text" class="form-control" id="title" required value="{{$test->title}}">
    </div>
    <div class="form-group">
        <label for="sub_title">副標題</label>
        <input name="sub_title" type="text" class="form-control" id="sub_title" required value="{{$test->id}}">

      </div>

      <div class="form-group">
        <div for="img_url">原本主要圖片<small class="text-danger">(建議上傳寬高比例4:3)</small></div>
        <img  class="figure" src="{{$test->img_url}}" alt="">
      </div>

      <div class="form-group">
        <label for="img_url">上傳修改圖片<small class="text-danger">(建議上傳寬高比例4:3)</small></label>
        <input name="img_url" type="file" class="form-control-file" id="img_url">
      </div>

      <div class="form-group">
        <label for="text">說明內容</label>
        <textarea name="text" class="form-control" id="text" rows="3" required>{{$test->text}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">送出編輯</button>
    </div>

    @endsection
