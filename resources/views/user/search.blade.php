@extends('user.layout.layout1')

@section('breadcrumb')
<div class="container">
  <div id="tree">
  <ul class="breadcrumb">
    <a><i class="fa fa-home"></i></a>
    <li class="breadcrumb-item"><a> Tìm kiếm </a></li>
  
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
              <div class="dogcat-sidebar-title"><a href="#" data-toggle="collapse" data-target="#demo" class="navbar-toggler collapse-icons"><i class="fad fa-dog"></i> DANH MỤC SẢN PHẨM</a></div>
              <div id="demo" class="dogcat-sidebar-subcategories data-toggle collapse in show" aria-expanded="true">
              <ul>
              @foreach ($categories as $subCategory)
              @if ($subCategory->ParentID == 0)
                <li><a href="{{ route('user.collection', ['tendanhmuc'=> $subCategory->Slug]) }}">{{$subCategory->Name}}</a></li>
              @endif
              @endforeach
          
              </ul>
            </div>
          </div>
        </div>
        <!--For Cats-->
        <div class="cartpage-block mt-3">
          <div class="dogcat-sidebar-categories mt-0">
            <div class="dogcat-sidebar-title"><a href="#" data-toggle="collapse" data-target="#demo1" class="navbar-toggler collapse-icons"><i class="fas fa-cat"></i> Sản phẩm hàng đầu</a></div>
            <div id="demo1" class="dogcat-sidebar-subcategories data-toggle collapse in show" aria-expanded="true">
              <ul>
     

                {{-- @foreach ($brandCount as $count)
                  @foreach ($productBrand as $brand)
                      @if ($count->BrandID === $brand->BrandID)

                        @if($brandFilter == 1)

                        <li><a href="/gian-hang/{{$tendanhmuc}}/brand={{$brand->BrandID}}">{{$brand->Name}} ({{$count->DuplicateTimes}})</a></li>
                        
                        @elseif($brandFilter == 0)
                    
                        <li><a href="/gian-hang/{{$tendanhmuc}}">{{$brand->Name}} ({{$count->DuplicateTimes}}) (Xóa)</a></li>
                        
                        @endif
                      
                      @endif
                  @endforeach
              
                @endforeach --}}
               
      


                
          
              </ul>
            </div>
          </div>
        </div>
        <!--Top Product-->
        {{-- <div class="cartpage-block mt-3">
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
        </div> --}}
      </div>
    </div>
    <div class="col-lg-9 pl-0 pr-0">
      <div class="cartpage-block ml-3 responsive-block-right">
        <div class="dogcat-main">
          <div class="dogcat-main-head">
            <div class="dogcat-main-head-1">
             
              <div class="dogcat-main-head-chosedisplay">
              <div class="float-left">Từ khoá: {{$keyword}}</div>
                <!--            	<span>Kiểu hiển thị</span> <a href="#"><i class="fal fa-list-alt"></i> Lưới</a> <a href="#"><i class="far fa-th"></i> Danh sách</a> --> 
         
  

                <select style="margin-left: 10px" onChange="window.location='?sort='+this.value">
                  
                  <option>Sắp xếp theo</option>
                  
       
                  <option value="/price-asc">Giá tăng dần</option>
                  <option value="/price-desc">Giá giảm dần</option>
         


                  
                </select>
              
              </div>
            </div>
            {{-- <div class="dogcat-main-head-2">
              <ul>
                <li>Ưu tiên hiển thị:</li>
                
                
                <li class="active"><a href="#"></a></li>
                <a href =  > <button class="btn btn-primary" style="background-color: #B224EF ; border: none">Xóa</button> </a>
              --}}
            
                <!--
              <li><a href="#">Mới nhất</a></li>
              <li><a href="#">Mua nhiều nhất</a></li>
-->
              {{-- </ul>
            </div> --}}
          </div>
          <div class="dogcat-main-body">
            <div id="product" class="row m-0 mt-3 p-2">
              @foreach ($productList as $product)
              <div class="col-md-3 ml-0 mr-0 pl-0 p-0">
                <div class="gv-item-container">
                  <div class="gv-item-img"> <img style="height: 160px ; width: 160px" src="{{ asset($product->Avatar) }}"> </div>
                  <div class="gv-item-section">
                    <div class="gv-item-section-pname"> <span><a href="{{ route('user.product', ['tensanpham'=>$product->Slug]) }}">{{$product->Name}}</a></span> </div>
                    <div class="gv-item-section-rate">
                      <ul class="rating">
                        @php
                            $haveRated = 0;
                        @endphp
                        @foreach ($ratedList as $rating)
                            @if ($rating->ProductID == $product->ProductID)
                            
                            @php
                            $haveRated = 1;
                              $ratingHTML = "";
                                for ($i = 0 ; $i < $rating->Rate ; $i++){
                                  $ratingHTML .= '<li><i class="fa fa-star"></i></li>';
                                }
                                for ($i = 0 ; $i < 5 - $rating->Rate ; $i++){
                                  $ratingHTML .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
                                }
                            @endphp
                           
                            
                            @break
                       


                            @endif
                        @endforeach

                        @if ($haveRated == 0)
                        @php
                          $ratingHTML = "";
                            for ($i = 0 ; $i < 5 ; $i++){
                              $ratingHTML .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
                            }
                        @endphp
                        @endif

                        {!!$ratingHTML!!}
               
                        
                 
                      </ul>
                    </div>
                    <div class="gv-item-section-price">
                      <span>{{number_format($product->Price, 0, '', ',')}}VNĐ</span>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach


			</div>
          </div>
          <div class="dogcat-main-footer">
            <div class="dogcat-main-footer-pagination">
              {{$productList->appends(request()->input())->links('pagination::bootstrap-4')}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

