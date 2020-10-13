@extends('layouts/nav_footer')

@section('css')

<link rel="stylesheet" href="./css/news.css">
@endsection

@section('content')
<section class="news">
<div class="container">
    <h2 class="news_title">最新商品</h2>
    {{-- <div class="row news_lists"> --}}

        @foreach ($product_types as $product_type)


        <h1 class="text-info">{{$product_type->type_name}}</h1>


        <div class="row news_lists">

            @foreach ($product_type->products as $products)

            <div class="col-md-4 news_list mx-1">

                <h4>{{$products->name}}</h4>
                <img width="100%" height="350px" src="{{$products->product_img}}" alt="圖片建議尺寸: 1000 x 567">

                <p class="news_content">說明:{{$products->info}}</p>
                <h4>價錢:{{$products->price}}</h4>



                <a class="btn btn-success" href="./products_info/{{$products->id}}" role="button">點擊查看更多 &raquo;</a>
            </div>
            @endforeach



        </div>

        @endforeach


    {{-- </div> --}}
</div>
</section>

@endsection

@section('nav_2')

active

@endsection
