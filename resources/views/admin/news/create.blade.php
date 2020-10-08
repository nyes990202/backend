@extends('layouts/app')



@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">主頁面</a></li>
        <li class="breadcrumb-item"><a href="/admin/news">資料列</a></li>
        <li class="breadcrumb-item active" aria-current="page">資料建立</li>
      </ol>
    </nav>


<div class="container">
<form method="POST" enctype="multipart/form-data" action='/admin/news/store'>
    @csrf
    <div class="form-group">
        <label for="title">標題 <small class="text-danger">(限制字數最多20)</small></label>
        <input name="title" type="text" class="form-control" id="title" required>
    </div>
    <div class="form-group">
        <label for="sub_title">副標題</label>
        <input name="sub_title" type="text" class="form-control" id="sub_title" required>

      </div>
      <div class="form-group">
        <label for="img_url">上傳圖片<small class="text-danger">(建議上傳寬高比例4:3)</small></label>
        <input name="img_url" type="file" class="form-control-file" id="img_url" required>
      </div>
      <div class="form-group">
        <label for="text">說明內容</label>
        <textarea name="text" class="form-control" id="text" rows="3" required></textarea>
      </div>
    <button type="submit" class="btn btn-primary">建立資料</button>
    </div>

    @endsection
