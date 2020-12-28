@extends('user.layout.layout1')

@section('breadcrumb')
<div class="container">
  <div id="tree">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="blog.html">Đơn mua</a></li>
  </ul>
  </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row profile">
      <div class="col-md-3 pl-0 pr-0">
        <div class="profile-sidebar"> 
          <!-- SIDEBAR USERPIC -->
          <div class="profile-userpic"> <img src="{{session()->get('loginData')['data']['Avatar']}}" class="img-responsive d-flex"  alt=""> </div>
          <!-- END SIDEBAR USERPIC --> 
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
            <div class="profile-usertitle-name"> {{session()->get('loginData')['data']['Name']}}&nbsp; </div>
            <div class="profile-usertitle-job"> Khách hàng thân thiết <i class="far fa-crown"></i></div>
          </div>
          <!-- END SIDEBAR USER TITLE --> 
          <!-- SIDEBAR BUTTONS -->
          <div class="profile-userbuttons">
            <button type="button" class="btn btn-success btn-sm">Follow</button>
            <button type="button" class="btn btn-danger btn-sm">Message</button>
          </div>
          <!-- END SIDEBAR BUTTONS --> 
          <!-- SIDEBAR MENU -->
          <div class="profile-usermenu">
            <ul class="nav flex-column">
              <li id="profile-link"> <a href="{{ route('user.settings') }}"><i class="fal fa-user"></i>Tài khoản </a> </li>
              <li id="wishlist-link"> <a href="{{ route('user.favorite') }}"> <em class="fal fa-heart"></em> Yêu thích </a></li>
              <li class="active"> <a href="{{ route('user.delivery') }}"> <i class="fal fa-shipping-fast"></i> Đơn mua </a> </li>
            </ul>
          </div>
          <!-- END MENU --> 
        </div>
      </div>
      <div class="col-md-9 responsive-block-2 pl-0 pr-0 pl-3">
        <div class="wrapper-content" id="wrapper-content">
           <div id="profile">
       
    
            <div>
              @foreach ($orderList as $indexOrder => $order)
              <div id="profile-form">
                <div class="dogcat-sidebar-title">#{{($indexOrder + 1)}} Trạng thái: Chưa xác nhận <span style="float: right">Tổng tiền: {{number_format($order->Price, 0, '', ',')}}đ</span> </div>
                @foreach ($orderListDetail as $orderDetail)
                    @if ($orderDetail->OrderID == $order->OrderID)
                    <div id="item" class="cartpage-productlist-item">
                      @foreach ($productList as $productDetail)
                        @if ($productDetail->ProductID == $orderDetail->ProductID)
                        <div class="cartpage-productlist-item-img">
                          <img src="{{ asset($productDetail->Avatar) }}">
                        </div>
                        <div class="cartpage-productlist-item-section">
                          <div class="cartpage-productlist-item-section-name">
                  
                            <a href="{{ route('user.product', ['tensanpham'=>$productDetail->Slug]) }}">{{$productDetail->Name}}</a>
                          </div>
                        @endif
                      @endforeach

                        <div class="cartpage-productlist-item-section-price">
                         
                          <span>{{number_format($orderDetail->Price, 0, '', ',')}}</span><span> VNĐ</span>
                         
                        </div>
                        <span>x {{$orderDetail->Quality}} = {{number_format($orderDetail->Price * $orderDetail->Quality, 0, '', ',') }} VNĐ</span>
                      </div>
                      <div class="cartpage-productlist-item-qualityzone">
                        <div class="dpd-block-section-quality">
                    
                         
                          <span>Số lượng: <input disabled value="{{$orderDetail->Quality}}" style="width: 10px"></span>
                         
                        </div>
                      </div>
                    </div>
                    @endif
                @endforeach
 

   
                
              </div>
              @endforeach
      
            </div>
              
             
           
        </div>
      </div>
    </div>
  </div>
@endsection



