@extends('user.layout.layout1')

@section('breadcrumb')
<div class="container">
  <div id="tree">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="blog.html">dfdfdf</a></li>
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
            src="{{ asset('frontend/images/home/Feature Image/credit-card.svg') }}">
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
              <div class="col-md-6">
                <div class="new-body">
                  <div class="new-body-picture"> <img src="{{ asset('frontend/images/product/product0.jpg') }}"> </div>
                  <div class="new-body-section">
                    <div class="new-section-title"> <a href="html/sanpham/cho/sanpham1.html">Bánh thưởng cho chó chăm
                        sóc răng miệng Jerry Stick</a> </div>
                    <div class="new-section-price"> 95.000 VNĐ </div>
                    <div class="new-section-detail"> Bánh thưởng cho chó chăm sóc răng miệng Best Bone Dental Snack phù
                      hợp với tất cả các giống chó. </div>
                    <div class="new-section-countdown"> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="new-body">
                  <div class="new-body-picture"> <img src="{{ asset('frontend/images/product/product1.jpg') }}"> </div>
                  <div class="new-body-section">
                    <div class="new-section-title"> <a href="html/sanpham/cho/sanpham1.html">Thức ăn khô cho chó 8 tuổi
                        ANF Organic Lamb</a> </div>
                    <div class="new-section-price"> 300.000 VNĐ </div>
                    <div class="new-section-detail"> Thức ăn cho chó ANF Organic Lamb là thức ăn dành riêng cho các
                      giống chó từ 3 tháng tuổi trở lên. </div>
                    <div class="new-section-countdown"> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-6">
                <div class="new-body">
                  <div class="new-body-picture"> <img src="{{ asset('frontend/images/product/product2.jpg') }}"> </div>
                  <div class="new-body-section">
                    <div class="new-section-title"> <a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó con Josera
                        Josidog Family</a> </div>
                    <div class="new-section-price"> 650.000 VNĐ </div>
                    <div class="new-section-detail"> Thức ăn cho chó Josera Josidog Family cho chó mang thai, cho con bú
                      và đang phát triển. </div>
                    <div class="new-section-countdown"> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="new-body">
                  <div class="new-body-picture"> <img src="{{ asset('frontend/images/product/product3.jpg') }}"> </div>
                  <div class="new-body-section">
                    <div class="new-section-title"> <a href="html/sanpham/cho/sanpham1.html">Thức ăn cho mèo Anh lông
                        ngắn Catidea British Shorthair</a> </div>
                    <div class="new-section-price"> 1.550.000 VNĐ </div>
                    <div class="new-section-detail"> Thức ăn cho mèo Anh lông ngắn Catidea British Shorthair là thức ăn
                      dành riêng cho giống mèo anh lông ngắn mới cai sữa và mèo trưởng thành. </div>
                    <div class="new-section-countdown"> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <p style="text-align: right"> <a href="#newproduct-carousel" role="button" data-slide="prev"><span
              class="next-icon"><i class="fas fa-arrow-left"></i></span></a> <a href="#newproduct-carousel"
            role="button" data-slide="next"><span class="next-icon"><i class="fas fa-arrow-right"></i></span></a> </p>
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
            <div class="col-md-3 col-6">
              <div class="saleoff-body">
                <div class="saleoff-body-picture"> <img src="{{ asset('frontend/images/product/product 20.jpg') }}"> </div>
                <div class="saleoff-body-section">
                  <div class="saleoff-section-title"><a href="html/sanpham/cho/sanpham1.html">Máy tự động hẹn giờ cho
                      Pet ăn</a></div>
                  <div class="saleoff-section-price"><span class="old-price">350.000 VND</span><span
                      class="new-price">350.000 VND</span></div>
                </div>
                <span class="badge-sale">Giảm giá</span>
              </div>
            </div>
            <!--          ==============================-->
            <div class="col-md-3 col-6">
              <div class="saleoff-body">
                <div class="saleoff-body-picture"> <img src="{{ asset('frontend/images/product/product 21.jpg') }}"> </div>
                <div class="saleoff-body-section">
                  <div class="saleoff-section-title"><a href="html/sanpham/cho/sanpham1.html">Đĩa đựng thức ăn chó
                      mèo</a></div>
                  <div class="saleoff-section-price"><span class="old-price">350.000 VND</span><span
                      class="new-price">350.000 VND</span></div>
                </div>
                <span class="badge-sale">Giảm giá</span>
              </div>
            </div>
            <!--          ==============================-->
            <div class="col-md-3 col-6">
              <div class="saleoff-body">
                <div class="saleoff-body-picture"> <img src="{{ asset('frontend/images/product/product 22.jpg') }}"> </div>
                <div class="saleoff-body-section">
                  <div class="saleoff-section-title"><a href="html/sanpham/cho/sanpham1.html">Snack Xương Canxi ORGO cho
                      Chó 90gr</a></div>
                  <div class="saleoff-section-price"><span class="old-price">350.000 VND</span><span
                      class="new-price">350.000 VND</span></div>
                </div>
                <span class="badge-sale">Giảm giá</span>
              </div>
            </div>
            <!--          ==============================-->
            <div class="col-md-3 col-6">
              <div class="saleoff-body">
                <div class="saleoff-body-picture"> <img src="{{ asset('frontend/images/product/product 23.jpg') }}"> </div>
                <div class="saleoff-body-section">
                  <div class="saleoff-section-title"><a href="html/sanpham/cho/sanpham1.html">Bình Sữa Ti Nhỏ Cho Chó
                      Mèo</a></div>
                  <div class="saleoff-section-price"><span class="old-price">350.000 VND</span><span
                      class="new-price">350.000 VND</span></div>
                </div>
                <span class="badge-sale">Giảm giá</span>
              </div>
            </div>
            <!--          ==============================-->
            <div class="col-md-3 col-6">
              <div class="saleoff-body">
                <div class="saleoff-body-picture"> <img src="{{ asset('frontend/images/product/product8.jpg') }}"> </div>
                <div class="saleoff-body-section">
                  <div class="saleoff-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn hạt cho mèo Hàn
                      Quốc Catsrang</a></div>
                  <div class="saleoff-section-price"><span class="old-price">350.000 VND</span><span
                      class="new-price">350.000 VND</span></div>
                </div>
                <span class="badge-sale">Giảm giá</span>
              </div>
            </div>
            <!--          ==============================-->
            <div class="col-md-3 col-6">
              <div class="saleoff-body">
                <div class="saleoff-body-picture"> <img src="{{ asset('frontend/images/product/product1.jpg') }}"> </div>
                <div class="saleoff-body-section">
                  <div class="saleoff-section-title"><a href="html/sanpham/cho/sanpham1.html">Cẩu lương</a></div>
                  <div class="saleoff-section-price"><span class="old-price">350.000 VND</span><span
                      class="new-price">350.000 VND</span></div>
                </div>
                <span class="badge-sale">Giảm giá</span>
              </div>
            </div>
            <!--          ==============================-->
            <div class="col-md-3 col-6">
              <div class="saleoff-body">
                <div class="saleoff-body-picture"> <img src="{{ asset('frontend/images/product/product2.jpg') }}"> </div>
                <div class="saleoff-body-section">
                  <div class="saleoff-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho mèo lớn</a>
                  </div>
                  <div class="saleoff-section-price"><span class="old-price">350.000 VND</span><span
                      class="new-price">350.000 VND</span></div>
                </div>
                <span class="badge-sale">Giảm giá</span>
              </div>
            </div>
            <!--          ==============================-->
            <div class="col-md-3 col-6">
              <div class="saleoff-body">
                <div class="saleoff-body-picture"> <img src="{{ asset('frontend/images/product/product4.jpg') }}"> </div>
                <div class="saleoff-body-section">
                  <div class="saleoff-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó lớn</a>
                  </div>
                  <div class="saleoff-section-price"><span class="old-price">350.000 VND</span><span
                      class="new-price">350.000 VND</span></div>
                </div>
                <span class="badge-sale">Giảm giá</span>
              </div>
            </div>
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
          <div class="topproduct-body">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/product/product1.jpg') }}"><span
                class="badge-top">#1</span></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn khô cho chó con</a>
              </div>
              <div class="topproduct-section-price">500.000VNĐ</div>
              <div class="topproduct-rate">
                <ul class="rating" style="text-align: left">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </div>
            </div>
          </div>
          <!--        ==============================-->
          <div class="topproduct-body">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/product/product3.jpg') }}"><span
                class="badge-top">#2</span></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn khô Me-O</a></div>
              <div class="topproduct-section-price">500.000VNĐ</div>
              <div class="topproduct-rate">
                <ul class="rating" style="text-align: left">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </div>
            </div>
          </div>
          <!--        ==============================-->
          <div class="topproduct-body no-boder-bottom">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/product/product9.jpg') }}"><span
                class="badge-top">#3</span></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn khô Catrangs cho
                  mèo</a></div>
              <div class="topproduct-section-price">500.000VNĐ</div>
              <div class="topproduct-rate">
                <ul class="rating" style="text-align: left">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </div>
            </div>
          </div>
          <!--        ==============================-->
        </div>
      </div>
    </div>
  </div>
  <!--================== For DOG ==================-->
  <div class="container  mt-3">

    @foreach ($categories as $category)
      @if ($category->CategoryID == 1 )
        <div class="puppy-container">
        <div class="puppy-left">
        <div class="puppy-left-title" style="background: #B224EF"><a href="{{ route('user.collection', $category->Slug) }}">{{$category->Name}}</a> </div>
        <div class="puppy-left-nav">
        <ul>
        @foreach ($categories as $subCategory)
          @if ($subCategory->ParentID == $category->CategoryID)
              <li><a href="{{ route('user.collection', $subCategory->Slug) }}">{{$subCategory->Name}}</a></li>
          @endif
        @endforeach
      @endif
    @endforeach
    </ul>
    </div>
    </div>


  {{-- <div class="container  mt-3">
    <div class="puppy-container">
      <div class="puppy-left">
        <div class="puppy-left-title" style="background: #B224EF"><a href="collection.html">DÀNH CHO CÚN CƯNG</a> </div>
        <div class="puppy-left-nav">
          <ul> --}}
            {{-- <li><a href="collection.html">Thức ăn</a></li>
            <li><a href="collection.html">Quần áo</a></li>
            <li><a href="collection.html">Phụ kiện</a></li>
            <li><a href="collection.html">Đồ vệ sinh</a></li>
          </ul>
        </div>
      </div> --}}
      <!--========= CENTER PANEL =========-->
      <div class="puppy-center">
        <div class="row ml-0 mr-0">
          <div class="col-md-3 col-12 col-sm-6">
            <div class="puppy-center-body">
              <div class="puppy-center-body-picture"><img src="{{ asset('frontend/images/product/product0.jpg') }}"></div>
              <div class="puppy-center-body-section">
                <div class="puppy-center-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn khô Jerry
                    Stick</a></div>
                <ul class="rating">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <div class="puppy-center-section-price">
                  <div class="new-price">69.000 VNĐ</div>
                </div>
              </div>
            </div>
          </div>
          <!--		=============================-->
          <div class="col-md-3 col-12 col-sm-6">
            <div class="puppy-center-body">
              <div class="puppy-center-body-picture"><img src="{{ asset('frontend/images/product/product1.jpg') }}"></div>
              <div class="puppy-center-body-section">
                <div class="puppy-center-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn khô cho cún
                    con</a></div>
                <ul class="rating">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <div class="puppy-center-section-price">
                  <div class="new-price">69.000 VNĐ</div>
                </div>
              </div>
            </div>
          </div>
          <!--		=============================-->
          <div class="col-md-3 col-12 col-sm-6">
            <div class="puppy-center-body">
              <div class="puppy-center-body-picture"><img src="{{ asset('frontend/images/product/product2.jpg') }}"></div>
              <div class="puppy-center-body-section">
                <div class="puppy-center-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho cho cún 4
                    tháng tuổi</a></div>
                <ul class="rating">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <div class="puppy-center-section-price">
                  <div class="new-price">69.000 VNĐ</div>
                </div>
              </div>
            </div>
          </div>
          <!--		=============================-->
          <div class="col-md-3 col-12 col-sm-6">
            <div class="puppy-center-body">
              <div class="puppy-center-body-picture"><img src="{{ asset('frontend/images/product/product4.jpg') }}"></div>
              <div class="puppy-center-body-section">
                <div class="puppy-center-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn khô Jerry
                    Cuts</a></div>
                <ul class="rating">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <div class="puppy-center-section-price">
                  <div class="new-price">69.000 VNĐ</div>
                </div>
              </div>
            </div>
          </div>
          <!--		=============================-->
          <!--END Puppy=============================-->
        </div>
      </div>
    </div>
  </div>
  <!--================== For CAT ==================-->
  <div class="container  mt-3">

    @foreach ($categories as $category)
      @if ($category->CategoryID == 2 )
        <div class="puppy-container">
        <div class="puppy-left">
        <div class="puppy-left-title" style="background: #B224EF"><a href="{{ route('user.collection',$category->Slug) }}">{{$category->Name}}</a> </div>
        <div class="puppy-left-nav">
        <ul>
        @foreach ($categories as $subCategory)
          @if ($subCategory->ParentID == $category->CategoryID)
              <li><a href="{{ route('user.collection', $subCategory->Slug) }}">{{$subCategory->Name}}</a></li>
          @endif
        @endforeach
      @endif
    @endforeach
    </ul>
    </div>
    </div>
      <!--========= CENTER PANEL =========-->
      <div class="puppy-center">
        <div class="row ml-0 mr-0">
          <div class="col-md-3 col-12 col-sm-6">
            <div class="puppy-center-body">
              <div class="puppy-center-body-picture"><img src="{{ asset('frontend/images/product/product8.jpg') }}"></div>
              <div class="puppy-center-body-section">
                <div class="puppy-center-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn hạt cho mèo Hàn
                    Quốc Catsrang</a></div>
                <ul class="rating">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <div class="puppy-center-section-price">
                  <div class="new-price">69.000 VNĐ</div>
                </div>
              </div>
            </div>
          </div>
          <!--		=============================-->
          <div class="col-md-3 col-12 col-sm-6">
            <div class="puppy-center-body">
              <div class="puppy-center-body-picture"><img src="{{ asset('frontend/images/product/product9.jpg') }}"></div>
              <div class="puppy-center-body-section">
                <div class="puppy-center-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn hạt cho mèo mọi
                    lứa tuổi CATSRANG</a></div>
                <ul class="rating">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <div class="puppy-center-section-price">
                  <div class="new-price">69.000 VNĐ</div>
                </div>
              </div>
            </div>
          </div>
          <!--		=============================-->
          <div class="col-md-3 col-12 col-sm-6">
            <div class="puppy-center-body">
              <div class="puppy-center-body-picture"><img src="{{ asset('frontend/images/product/product10.jpg') }}"></div>
              <div class="puppy-center-body-section">
                <div class="puppy-center-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức Ăn Cho Mèo Lớn
                    Me-O Adult (350g)</a></div>
                <ul class="rating">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <div class="puppy-center-section-price">
                  <div class="new-price">69.000 VNĐ</div>
                </div>
              </div>
            </div>
          </div>
          <!--		=============================-->
          <div class="col-md-3 col-12 col-sm-6">
            <div class="puppy-center-body">
              <div class="puppy-center-body-picture"><img src="{{ asset('frontend/images/product/product11.jpg') }}"></div>
              <div class="puppy-center-body-section">
                <div class="puppy-center-section-title"><a href="html/sanpham/cho/sanpham1.html">Thức ăn hạt cho mèo con
                    Hàn Quốc Catsrang Kittten</a></div>
                <ul class="rating">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <div class="puppy-center-section-price">
                  <div class="new-price">69.000 VNĐ</div>
                </div>
              </div>
            </div>
          </div>
          <!--		=============================-->
          <!--END Puppy=============================-->
        </div>
      </div>
    </div>
  </div>
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
            <div class="hblog-body-picture"> <img src="{{ asset('frontend/images/Anhnen.jpg') }}"> <span
                class="hblog-date-badge">24/6/2020</span> </div>
            <div class="hblog-body-section">
              <div class="hblog-section-title"><a href="html/blog/blog4.html">Phải làm gì khi cún yêu tiêu chảy?</a>
              </div>
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