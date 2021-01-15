@extends('user.layout.layout1')
@section('breadcrumb')
<div class="container">
  <div id="tree">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('user.blog') }}">Blog và tin tức</a></li>
  </ul>
  </div>
</div>
@endsection

@section('content')
@if (isset($_GET["page"]) == false)
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="default-block p-4">
        <div class="title-block mb-3">
          <h5>BÀI VIẾT <b>NỔI BẬT</b></h5>
        </div>
        
        <div class="blog-picture"> <img src="{{ asset($blog1->avatar) }}" class="img-fluid" style="width: 682px; height: 455px"> </div>
        <div class="blog-section">
          <p>
          <a href="{{ route('get.blog.content', ['slug'=>$blog1->slug]) }}">
          <h4>{{$blog1->name}}</h4>
          </a>
          </p>
          <p>{{ strip_tags(Str::limit($blog1->content, 269)) }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 pl-0 responsive-block-1">
      <div class="default-block p-4">
        <div class="title-block mb-3">
          <h5>BÀI VIẾT <b>MỚI NHẤT</b></h5>
        </div>
        @foreach ($blog2 as $item)
        <div class="topproduct-body">
          <div class="topproduct-body-picture"><img src="{{ asset($item->avatar) }}" style="height: 76px"></div>
          <div class="topproduct-body-section">
            <div class="topproduct-section-title"><a href="{{ route('get.blog.content', ['slug'=>$item->slug]) }}">{{$item->name}}</a></div>
            <p>{{ strip_tags(Str::limit($item->content, 83)) }}</p>
          </div>
        </div>
        @endforeach

   
      </div>
   
    </div>

  </div>
  <br>

</div>


@endif
<div class="container">
  @foreach ($blog3 as $item)
  <div class="postitem">
    <div class="row">
        <div class="col-auto">
            <div class="postmeta">
         
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset($item->avatar) }}" style="width: 100%;">
                </div>
                <div class="col-8">
                    <div class="post-title">
                        <a href="{{ route('get.blog.content', ['slug'=>$item->slug]) }}">{{$item->name}}</a>
                        <br>
                        <p style="font-size: 14px; color: #888888">{{ strip_tags(Str::limit($item->content, 83)) }}</p>
                        <br>
                        <a href="{{ route('get.blog.content', ['slug'=>$item->slug]) }}" style="font-size: 14px; color: black; font-weight: 700;">ĐỌC THÊM-&gt;</a>
                    </div>
                    
                </div>
                
            </div>
            
           
        </div>
    </div>
  </div>
  @endforeach

    
  {{$blog3->links()}}
</div>
@endsection

@push('styles')
    <style>
      .postitem {
    padding: 10px;
    margin-bottom: 20px;
    background-color: white;
}

.postitem .row {
    padding: 10px;
}

.postmeta {
    text-align: center;
}

.postmeta .postdate {
    font-weight: 700;
    font-size: 32px;
}

.postmeta .postmonth {
    white-space: nowrap;
    font-size: 13px;
}

.post-title a {
    text-decoration: none;
    font-size: 18px;
}
    </style>
@endpush