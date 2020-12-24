@extends('user.layout.layout1')

@section('breadcrumb')
<div class="container">
  <div id="tree">
  <ul class="breadcrumb">
    <a href="{{ route('user.collection', "all") }}"><i class="fa fa-home"></i></a>
    @foreach (array_reverse($categoriesArr) as $category)
      @foreach(explode('|', $category) as $key=>$item)
        @if($key == 0)
          <li class="breadcrumb-item"><a href="{{ route('user.collection', $item) }}">
    
        @elseif($key == 1)
          <span>{{ $item }}<span></a></li>
        
        @endif
      @endforeach
    @endforeach
    
   
    
  </ul>
  </div>
</div>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-3 pl-0 pr-0">
      <div class="dogcat-sidebar"> 
        <!--For DOG-->
        <div class="dogcat-sidebar-categories">
          <div class="cartpage-block">
            @foreach ($categories as $category)
              @if ($category->Slug == $tendanhmuc || $tendanhmuc == "all")
                @if($tendanhmuc != "all")
                  <div class="dogcat-sidebar-title"><a href="#" data-toggle="collapse" data-target="#demo" class="navbar-toggler collapse-icons"><i class="fad fa-dog"></i> {{$category->Name}}</a></div>
                  <div id="demo" class="dogcat-sidebar-subcategories data-toggle collapse in show" aria-expanded="true">
                    <ul>
                  @foreach ($categories as $subCategory)
                    @if ($subCategory->ParentID == $category->CategoryID)
                      <li><a href="{{ route('user.collection', ['tendanhmuc'=> $subCategory->Slug]) }}">{{$subCategory->Name}}</a></li>
                    @endif
                  @endforeach
              @endif
              @endif
            @endforeach
            @if($tendanhmuc == "all")
              <div class="dogcat-sidebar-title"><a href="#" data-toggle="collapse" data-target="#demo" class="navbar-toggler collapse-icons"><i class="fad fa-dog"></i> DANH MỤC SẢN PHẨM</a></div>
              <div id="demo" class="dogcat-sidebar-subcategories data-toggle collapse in show" aria-expanded="true">
              <ul>
              @foreach ($categories as $subCategory)
              @if ($subCategory->ParentID == 0)
                <li><a href="{{ route('user.collection', ['tendanhmuc'=> $subCategory->Slug]) }}">{{$subCategory->Name}}</a></li>
              @endif
              @endforeach
            @endif
              </ul>
            </div>
          </div>
        </div>
        <!--For Cats-->
        <div class="cartpage-block mt-3">
          <div class="dogcat-sidebar-categories mt-0">
            <div class="dogcat-sidebar-title"><a href="#" data-toggle="collapse" data-target="#demo1" class="navbar-toggler collapse-icons"><i class="fas fa-cat"></i> Lọc theo thương hiệu</a></div>
            <div id="demo1" class="dogcat-sidebar-subcategories data-toggle collapse in show" aria-expanded="true">
              <ul>
                <li><a href="#">Monge (Italy)</a></li>
                <li><a href="#">MORANDO (Italy)</a></li>
                <li><a href="#">Royal Canin (Pháp)</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!--Top Product-->
        <div class="cartpage-block mt-3">
          <div class="dogcat-sidebar-categories">
            <div class="dogcat-sidebar-title mt-0"><a href="#" data-toggle="collapse" data-target="#demo2" class="navbar-toggler collapse-icons"><i class="fas fa-crown"></i> SẢN PHẨM HÀNG ĐẦU</a></div>
            <div id="demo2" class="dogcat-sidebar-subcategories collapse show">
              <div class="topproduct-container border-0">
                <div class="topproduct-body">
                  <div class="topproduct-body-picture"><img src="{{ asset('images/product/product1.jpg') }}"><span class="badge-top">#1</span></div>
                  <div class="topproduct-body-section">
                    <div class="topproduct-section-title"><a href="html/sanpham/cho/sanpham1.html">Sản phẩm top 1</a></div>
                    <div class="topproduct-section-price">500.000VNĐ</div>
                  </div>
                </div>
                <!--==============================-->
                <div class="topproduct-body">
                  <div class="topproduct-body-picture"><img src="{{ asset('images/product/product2.jpg') }}"><span class="badge-top">#2</span></div>
                  <div class="topproduct-body-section">
                    <div class="topproduct-section-title"><a href="html/sanpham/cho/sanpham1.html">Sản phẩm top 2</a></div>
                    <div class="topproduct-section-price">500.000VNĐ</div>
                  </div>
                </div>
                <!--        ==============================-->
                <div class="topproduct-body no-boder-bottom">
                  <div class="topproduct-body-picture"><img src="{{ asset('images/product/product3.jpg') }}"><span class="badge-top">#3</span></div>
                  <div class="topproduct-body-section">
                    <div class="topproduct-section-title"><a href="html/sanpham/cho/sanpham1.html">Sản phẩm top 3</a></div>
                    <div class="topproduct-section-price">500.000VNĐ</div>
                  </div>
                </div>
                <!--        ==============================--> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 pl-0 pr-0">
      <div class="cartpage-block ml-3 responsive-block-right">
        <div class="dogcat-main">
          <div class="dogcat-main-head">
            <div class="dogcat-main-head-1">
             
              <div class="dogcat-main-head-chosedisplay"> 
                <!--            	<span>Kiểu hiển thị</span> <a href="#"><i class="fal fa-list-alt"></i> Lưới</a> <a href="#"><i class="far fa-th"></i> Danh sách</a> --> 
         
  

                <select name="cars" id="cars" style="margin-left: 10px">
                  <option value="volvo">Sắp xếp theo</option>
                  <option value="saab">Giá tăng dần</option>
                  <option value="mercedes">Giá giảm dần</option>
                  <option value="audi">Đánh giá</option>
                </select>
              
              </div>
            </div>
            <div class="dogcat-main-head-2">
              <ul>
                <li>Ưu tiên hiển thị:</li>
                <li class="active"><a href="#">Tất cả sản phẩm</a></li>
                <!--
              <li><a href="#">Mới nhất</a></li>
              <li><a href="#">Mua nhiều nhất</a></li>
-->
              </ul>
            </div>
          </div>
          <div class="dogcat-main-body">
            <div id="product" class="row m-0 mt-3 p-2">
				            <div class="col-md-3 ml-0 mr-0 pl-0 p-0">
              <div class="gv-item-container">
                <div class="gv-item-img"> <img src="{{ asset('frontend/images/product/product0.jpg') }}"> </div>
                <div class="gv-item-section">
                  <div class="gv-item-section-pname"> <span><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó con 1</a></span> </div>
                  <div class="gv-item-section-rate">
                    <ul class="rating">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="gv-item-section-price">
                  	<span>150.000 VNĐ</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ml-0 mr-0 pl-0 p-0">
              <div class="gv-item-container">
                <div class="gv-item-img"> <img src="{{ asset('frontend/images/product/product1.jpg') }}"> </div>
                <div class="gv-item-section">
                  <div class="gv-item-section-pname"> <span><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó con 2</a></span> </div>
                  <div class="gv-item-section-rate">
                    <ul class="rating">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="gv-item-section-price">
                  	<span>150.000 VNĐ</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ml-0 mr-0 pl-0 p-0">
              <div class="gv-item-container">
                <div class="gv-item-img"> <img src="{{ asset('frontend/images/product/product2.jpg') }}"> </div>
                <div class="gv-item-section">
                  <div class="gv-item-section-pname"> <span><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó con 3</a></span> </div>
                  <div class="gv-item-section-rate">
                    <ul class="rating">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="gv-item-section-price">
                  	<span>150.000 VNĐ</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ml-0 mr-0 pl-0 p-0">
              <div class="gv-item-container">
                <div class="gv-item-img"> <img src="{{ asset('frontend/images/product/product3.jpg') }}"> </div>
                <div class="gv-item-section">
                  <div class="gv-item-section-pname"> <span><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó con 4</a></span> </div>
                  <div class="gv-item-section-rate">
                    <ul class="rating">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="gv-item-section-price">
                  	<span>150.000 VNĐ</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ml-0 mr-0 pl-0 p-0">
              <div class="gv-item-container">
                <div class="gv-item-img"> <img src="{{ asset('frontend/images/product/product4.jpg') }}"> </div>
                <div class="gv-item-section">
                  <div class="gv-item-section-pname"> <span><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó con 5</a></span> </div>
                  <div class="gv-item-section-rate">
                    <ul class="rating">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="gv-item-section-price">
                  	<span>150.000 VNĐ</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ml-0 mr-0 pl-0 p-0">
              <div class="gv-item-container">
                <div class="gv-item-img"> <img src="{{ asset('frontend/images/product/product5.jpg') }}"> </div>
                <div class="gv-item-section">
                  <div class="gv-item-section-pname"> <span><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó con 6</a></span> </div>
                  <div class="gv-item-section-rate">
                    <ul class="rating">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="gv-item-section-price">
                  	<span>150.000 VNĐ</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ml-0 mr-0 pl-0 p-0">
              <div class="gv-item-container">
                <div class="gv-item-img"> <img src="{{ asset('frontend/images/product/product6.jpg') }}"> </div>
                <div class="gv-item-section">
                  <div class="gv-item-section-pname"> <span><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó con 7</a></span> </div>
                  <div class="gv-item-section-rate">
                    <ul class="rating">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="gv-item-section-price">
                  	<span>150.000 VNĐ</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 ml-0 mr-0 pl-0 p-0">
              <div class="gv-item-container">
                <div class="gv-item-img"> <img src="{{ asset('frontend/images/product/product7.jpg') }}"> </div>
                <div class="gv-item-section">
                  <div class="gv-item-section-pname"> <span><a href="html/sanpham/cho/sanpham1.html">Thức ăn cho chó con 8</a></span> </div>
                  <div class="gv-item-section-rate">
                    <ul class="rating">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="gv-item-section-price">
                  	<span>150.000 VNĐ</span>
                  </div>
                </div>
              </div>
            </div>
			</div>
          </div>
          <div class="dogcat-main-footer">
            <div class="dogcat-main-footer-pagination">
              <ul class="pagination">
                <li id="prev" class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                <li id="1" class="page-item active" ><a class="page-link" href="#">1</a></li>
                <li id="2" class="page-item"><a class="page-link" href="#">2</a></li>
                <li id="next" class="page-item"><a class="page-link" href="#">Sau</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection