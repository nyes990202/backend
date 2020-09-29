@extends('layouts/nav_footer')

@section('css')
<link rel="stylesheet" href="./css/news_info.css">

<section class="news_info">

    <div class="container">
    <h2 class="info_title">{{$news_list->title}}</h2>
        <div class="row">
            <div class="col-12 my-3 my-md-0 col-md-6">
                <div class="image_box h-100">
                    <a href="" data-lightbox="image-1" data-title="My caption">
                        <img width="100%" height="500px" src="{{$news_list->img_url}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 my-3 my-md-0 col-md-6">
                <div class="info_content">
                    <h3>{{$news_list->sub_title}}</h3>
                    {{$news_list->text}}
                </div>

            </div>
        </div>
    </div>


</section>

@section('light_box')
<!-- lightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>




@endsection
