@extends('layouts/nav_footer')

@section('nav_1')

active

@endsection

@section('content')
<section class="banner">
    <div class="swiper-container banner-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img width="100%" src="./images/index/banner/banner_1.JPG" alt="">
            </div>
            <div class="swiper-slide">
                <img width="100%" src="./images/index/banner/banner_2.JPG" alt="">
            </div>
            <div class="swiper-slide">
                <img width="100%" src="./images/index/banner/banner_3.JPG" alt="">
            </div>
            <div class="swiper-slide">
                <img width="100%" src="./images/index/banner/banner_4.JPG" alt="">
            </div>
            <div class="swiper-slide">
                <img width="100%" src="./images/index/banner/banner_5.JPG" alt="">
            </div>
            <div class="swiper-slide">
                <img width="100%" src="./images/index/banner/banner_6.JPG" alt="">
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next banner-button-next"></div>
        <div class="swiper-button-prev banner-button-prev"></div>
    </div>
</section>

<section class="news">
    <div class="container">
        <h2 class="news_title">最新消息</h2>
        <div class="row news_lists">
            @foreach ($news_list as $news)


            <div class="col-md-4">
                <div class="news_list">
                <h3>{{$news->title}}</h3>
                    <h4>{{$news->sub_title}}</h4>
                    <img width="100%" height="350px" src="{{$news->img_url}}" alt="圖片建議尺寸: 1000 x 567">
                    <p class="news_content">{{$news->text}}</p>
                    <a class="btn btn-success" href="./news_info.html" role="button">點擊查看更多 &raquo;</a>
                </div>
            </div>

            @endforeach
            {{-- <div class="col-md-4">
                <div class="news_list">
                    <h3>東台灣推薦秘境景點</h3>
                    <h4>景點名稱</h4>
                    <img width="100%" src="./images/index/news/news_example.JPG" alt="圖片建議尺寸: 1000 x 567">
                    <p class="news_content">一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字...</p>
                    <a class="btn btn-success" href="./news_info.html" role="button">點擊查看更多 &raquo;</a>
                </div>
            </div> --}}
            {{-- <div class="col-md-4">
                <div class="news_list">
                    <h3>南台灣推薦秘境景點</h3>
                    <h4>景點名稱</h4>
                    <img width="100%" src="./images/index/news/news_example.JPG" alt="圖片建議尺寸: 1000 x 567">
                    <p class="news_content">一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字</p>
                   <a class="btn btn-success" href="./news_info.html" role="button">點擊查看更多 &raquo;</a>
                </div>
            </div> --}}
        </div>
    </div>
</section>


@endsection


