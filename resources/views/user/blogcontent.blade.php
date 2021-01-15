@extends('user.layout.layout1')
@section('breadcrumb')
<div class="container">
  <div id="tree">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="blog.html">Blog và tin tức</a></li>
    <li class="breadcrumb-item active">{{$content->name}} </li>
  </ul>
  </div>
</div>
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-9 pl-0 pr-0 pr-lg-3 mb-3">
        <div class="main-blog"> <img src="{{ asset($content->avatar) }}" class="img-fluid mb-3">
          <h3>{{$content->name}}&nbsp;</h3>
          <div class="blog-info">
            <ul>
              <li><i class="fal fa-calendar-day"></i> {{$content->created_at}}</li>
              <li><i class="fal fa-comments"></i> {{$content->viewCount}} lượt xem </li>
            </ul>
          </div>
          <div class="article_content">
           {!!$content->content!!}
     
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="row">
          <div class="col pl-0 pr-0">
            <div class="relative-blog">
             <div class="heading"> ĐỀ XUẤT CHO BẠN </div>
             @foreach ($blog2 as $blog)
             <div class="relative-post d-flex ">
                <div class="picture"> <img src="{{ asset($blog->avatar) }}"> </div>
                <div class="content"><a href="{{ route('get.blog.content', ['slug'=>$blog->slug]) }}" class="title">{{$blog->name}}</a></div>
              </div>
             @endforeach
          
 
            </div>
            <div class="blog-ads-wrapper"><h5>Theo dõi Petlove Blogs để cập nhật những bài viết hấp dẫn</h5><a href="#"> <img src="{{ asset('frontend/images/—Pngtree—pet dog red dogs_1821721.png') }}" style="width: 100%; height: auto;"> </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('styles')
<style>
    #page-heading {
        position: relative;
        background-color: yellow;
    }
    #page-heading .tile-block {
    }
    .main-blog {
        background: #fff;
        padding: 30px;
    }
    .blog-info {
        display: block;
        margin-top: 15px;
        border-bottom: 1px solid #CDCDCD;
        border-top: 1px solid #CDCDCD;
    }
    .blog-info>ul>li {
        padding: 15px 20px;
        display: inline-block;
    }
    .article_content {
        margin: 15px;
    }
    .article_content p {
        margin: 15px;
        text-align: justify;
    }
    .relative-blog {
        border: 1px solid #cdcdcd;
        background: #fff;
    }
    .relative-blog .heading {
        display: block;
        background: #F24783;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        padding: 10px 15px;
    }
    .relative-blog .relative-post {
        display: block;
        position: relative;
        border-bottom: 1px dashed #cdcdcd;
        padding: 10px;
    }
    .relative-blog .relative-post .picture {
        display: inline-block;
        position: relative;
        width: 30%;
        height: auto;
    }
    .relative-blog .relative-post .picture img {
        display: inline-block;
        position: relative;
        width: 100%;
        height: auto;
    }
    .relative-blog .relative-post .content {
        display: inline-block;
        position: relative;
        width: 70%;
        height: auto;
        margin-left: 15px;
    }
    .relative-blog .relative-post .content .title {
        display: block;
        font-weight: 500;
        font-size: 14px;
    }
    .blog-ads-wrapper {
        background: #fff;
        padding: 15px;
        margin-top: 15px;
    }
    body {
        background: #F0F0F0;
    }
    </style>
@endpush