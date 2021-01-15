@extends('user.layout.layout1')

@section('breadcrumb')
<div class="container">
  <div id="tree">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item"><a>Trang chủ</a></li>
  </ul>
  </div>
</div>
@endsection

@section('content')

<!--================== BANNER 1 ==================-->
<div class="container mt-3">
  <div id="home-banner" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#home-banner" data-slide-to="0" class="active"></li>
      <li data-target="#home-banner" data-slide-to="1"></li>
      <li data-target="#home-banner" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item"> <img src="{{ asset('frontend/images/banner/0106_banner-home_KV-aniversario_1.webp') }}"
          style="width: 100%; height: auto" alt="New York"> </div>
      <div class="carousel-item active"> <img src="{{ asset('frontend/images/banner/576813507_banner-home_combo-racoes-umidas-50off.webp') }}"
          style="width: 100%; height: auto" alt="Los Angeles"> </div>
      <div class="carousel-item"> <img
          src="{{ asset('frontend/images/banner/576866324_banner-home_0106_ganhe-ate-3kg-racoes-selecionadas_1.webp') }}"
          style="width: 100%; height: auto" alt="Chicago"> </div>

    </div>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#home-banner" data-slide="prev"> <span
        class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#home-banner"
      data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
  </div>
</div>
<!--Info banner-->
<div class="container mt-3">
  <div class="row">
    <div class="col-md-4">
      <div class="pf-box default-block shadow-hover"> <img src="{{ asset('frontend/images/home/Feature Image/free-delivery.svg') }}">
        <center>
          <h5>Miễn phí giao hàng</h5>
          <p>Áp dụng cho nội thành Đà Nẵng</p>
        </center>
      </div>
    </div>
    <div class="col-md-4">
      <div class="pf-box default-block resposive-margin shadow-hover"> <img
          src="{{ asset('frontend/images/home/Feature Image/same-day-delivery.svg') }}">
        <center>
          <h5>Khách hàng thân thiết</h5>
          <p>Tích điểm để nhận nhiều ưu đãi</p>
        </center>
      </div>
    </div>
    <div class="col-md-4">
      <div class="pf-box default-block resposive-margin shadow-hover"> <img
          src="{{ asset('frontend/images/home/Feature Image/credit-card.svg ') }}">
        <center>
          <h5>Sản phẩm chất lượng</h5>
          <p>Đối tác hàng trăm nhãn hàng nổi tiếng</p>
        </center>
      </div>
    </div>
  </div>
</div>
<!--================== BANNER 2 ==================-->

<!--================== NEW PRODUCT ==================-->
<div class="container mb-3 mt-3">
  <div class="new-container">
    <div class="new-title">
      <h5>Sản phẩm </h5>
      <h5><b>Mới</b></h5>
    </div>
    <div id="newproduct-carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row pl-0 pr-0">
        @foreach ($lastestProduct as $index => $product)
        @if ($index == 0)
        <div class="col-md-6">
          <div class="new-body">
            <div class="new-body-picture"> <img style="height: 127px; width: 127px ;background-color: rgb(300, 300, 300); " src="{{$product->Avatar}}"> </div>
            <div class="new-body-section">
              <div class="new-section-title"> <a href="{{ route('user.product', ['tensanpham'=>$product->Slug]) }}">{{$product->Name}}</a> </div>
              <div class="new-section-price"> {{number_format($product->Price, 0, '', ',')}}đ </div>
              <div class="new-section-detail"> Xem chi tiết </div>
              <div class="new-section-countdown"> </div>
            </div>
          </div>
        </div>
        @endif
        @if ($index == 1)
        <div class="col-md-6">
          <div class="new-body">
            <div class="new-body-picture"> <img style="height: 127px; width: 127px ; background-color: rgb(300, 300, 300);" src="{{$product->Avatar}}"> </div>
            <div class="new-body-section">
              <div class="new-section-title"> <a href="{{ route('user.product', ['tensanpham'=>$product->Slug]) }}">{{$product->Name}}</a> </div>
              <div class="new-section-price">{{number_format($product->Price, 0, '', ',')}}đ </div>
              <div class="new-section-detail"> Xem chi tiết </div>
              <div class="new-section-countdown"> </div>
            </div>
          </div>
        </div>
        </div>
      </div>
        @endif
      @if ($index == 2)
      <div class="carousel-item">
        <div class="row">
          <div class="col-md-6">
            <div class="new-body">
              <div class="new-body-picture"> <img style="height: 127px; width: 127px; background-color: rgb(300, 300, 300);" src="{{$product->Avatar}}"> </div>
              <div class="new-body-section">
                <div class="new-section-title"> <a href="{{ route('user.product', ['tensanpham'=>$product->Slug]) }}">{{$product->Name}}</a> </div>
                <div class="new-section-price"> {{number_format($product->Price, 0, '', ',')}}đ </div>
                <div class="new-section-detail"> Xem chi tiết </div>
                <div class="new-section-countdown"> </div>
              </div>
            </div>
          </div>
      @endif
      @if($index == 3)
      <div class="col-md-6">
        <div class="new-body">
          <div class="new-body-picture"> <img style="height: 127px; width: 127px; background-color: rgb(300, 300, 300);" src="{{$product->Avatar}}"> </div>
          <div class="new-body-section">
            <div class="new-section-title"> <a href="{{ route('user.product', ['tensanpham'=>$product->Slug]) }}">{{$product->Name}}</a> </div>
            <div class="new-section-price"> {{number_format($product->Price, 0, '', ',')}}đ </div>
            <div class="new-section-detail"> Xem chi tiết </div>
            <div class="new-section-countdown"> </div>
          </div>
        </div>
      </div>
      @endif


        @endforeach

        

          </div>
        </div>
      </div>
      <p style="text-align: right"> <a href="#newproduct-carousel" role="button" data-slide="prev"><span
            class="next-icon"><i class="fas fa-arrow-left"></i></span></a> <a href="#newproduct-carousel" role="button"
          data-slide="next"><span class="next-icon"><i class="fas fa-arrow-right"></i></span></a> </p>
    </div>
  </div>
</div>
<!--================== saleoffF AND TOP PRODUCT ==================-->
<div class="container  mt-3">
  <div class="row">
    <!--=========== SaleOff ===========-->
    <div class="col-md-8">
      <div class="saleoff-container">
        <div class="saleoff-title">
          <h5>Sản phẩm <b>giảm giá</b></h5>
        </div>
        <div class="row test-overflow">
          @foreach ($discountProduct as $item)
          <div class="col-md-3 col-6">
            <div class="saleoff-body">
              <div class="saleoff-body-picture"> <img style="height: 87px ; width: 87px" src="{{ asset($item->Avatar) }}"> </div>
              <div class="saleoff-body-section">
                <div class="saleoff-section-title" style="   white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><a href="{{ route('user.product', ['tensanpham'=>$item->Slug]) }}" >{{$item->Name}}</a></div>
                <div class="saleoff-section-price"><span class="old-price">{{number_format($item->OriginalPrice, 0, '', ',')}}đ</span><span
                    class="new-price">{{number_format($item->Price, 0, '', ',')}}đ</span></div>
              </div>
              <span class="badge-sale">Giảm giá {{$item->Rate}}%</span>
            </div>
          </div>
          @endforeach
          <!--          ==============================-->
        </div>
      </div>
    </div>
    <!--=========== Top product ===========-->
    <div class="col-md-4 pl-0 responsive-block-1">
      <div class="topproduct-container">
        <div class="topproduct-title">
          <h5>Sản phẩm <b>Hàng đầu</b></h5>
        </div>
        {!!$highestRatedProductHTML!!}

        <!--        ==============================-->
      </div>
    </div>
  </div>
</div>
<!--================== For DOG ==================-->


@foreach ($categories as $root)
    @if ($root->ParentID == 0 && $root->CategoryID != 3)
      <div class="container  mt-3">
        <div class="puppy-container">
          <div class="puppy-left">
            <div class="puppy-left-title" style="background: #B224EF"><a href="collection.html">{{$root->Name}}</a> </div>
            <div class="puppy-left-nav">
              <ul>
              @foreach ($categories as $sub)
                @if ($sub->ParentID == $root->CategoryID)
                  <li><a href="{{ route('user.collection', ['tendanhmuc'=> $sub->Slug ]) }}">{{$sub->Name}}</a></li>
                @endif
              @endforeach
              </ul>
            </div>
          </div>
          <!--========= CENTER PANEL =========-->
          <div class="puppy-center">
        
            <div class="row ml-0 mr-0 puppycontent" id="puppy{{$root->CategoryID}}-content">
        
           


              <!--END Puppy=============================-->
            </div>
            <br>
            <a style="margin-left: auto" href="{{ route('user.collection', ['tendanhmuc'=> $root->Slug ]) }}"><button class="btn btn-primary" style="background: #B224EF; border: none; width: 100px;">Xem thêm</button></a>
          </div>
        
        </div>
       
      </div>
      
    @endif
@endforeach


<!--================== HOME BLOG ==================-->
<div class="container  mt-3">
  <div class="hblog-container">
    <div class="hblog-title">
      <h5>PETLOVE <b>Blogs</b></h5>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="hblog-body">
          <div class="hblog-body-picture"> <img src="{{ asset('frontend/images/cover.5e44b5bd154a2.jpg') }}"> <span
              class="hblog-date-badge">24/6/2020</span> </div>
          <div class="hblog-body-section">
            <div class="hblog-section-title"><a href="html/blog/blog2.html">Chó Mang Thai Bao Lâu Thì Đẻ?</a></div>
            <div class="hblog-section-nutshell">Chó mang bầu mấy tháng đẻ? Câu hỏi này chắc được rất nhiều "ông bà
              ngoại" quan tâm...</div>
          </div>
        </div>
      </div>
      <!--=====================================-->
      <div class="col-md-4">
        <div class="hblog-body">
          <div class="hblog-body-picture"> <img src="{{ asset('frontend/images/Anhnen2.jpg') }}"> <span
              class="hblog-date-badge">24/6/2020</span> </div>
          <div class="hblog-body-section">
            <div class="hblog-section-title"><a href="html/blog/blog0.html">Mẹo chụp ảnh đẹp cho thú cưng của bạn</a>
            </div>
            <div class="hblog-section-nutshell">Chó becgie nhỏ 2 tháng đã cai sữa mẹ và có thể xuất chuồng...</div>
          </div>
        </div>
      </div>
      <!--=====================================-->
      <div class="col-md-4">
        <div class="hblog-body">
          <div class="hblog-body-picture"> <img src="{{ asset('frontend/images/Anhnen.jpg') }}"> <span class="hblog-date-badge">24/6/2020</span>
          </div>
          <div class="hblog-body-section">
            <div class="hblog-section-title"><a href="html/blog/blog4.html">Phải làm gì khi cún yêu tiêu chảy?</a></div>
            <div class="hblog-section-nutshell">Tiêu chảy là bệnh khá phổ biến ở cún yêu. Nếu áp dụng đúng biện pháp
              chữa trị, bệnh ..</div>
          </div>
        </div>
      </div>
      <!--=====================================-->
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script>
        
      $(window).ready(function() {
        prepareLoadProduct();
      });

      function prepareLoadProduct(){
        var x = document.getElementsByClassName("puppycontent");
          for (var i = 0 ; i < x.length ; i++){
            var thenum = x[i].id.replace(/^.*?(\d+).*/,'$1');
            console.log(thenum);
            loadProduct(thenum,'#'+x[i].id);
          }
          $("#cover").hide();  
      }
      function loadProduct(query, className){
        var _token = $('#token').val();
        $.ajax({
            url:"{{ route('ajax.product')}}",
            method:"GET", 
            data:{query: query , _token:_token},
            success:function(data){ 
              $(className).fadeIn();  
              $(className).html(data); 
            }
        });
      }

    </script>
@endpush