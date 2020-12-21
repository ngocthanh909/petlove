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
<div class="container">
    <div class="row profile">
      <div class="col-md-3 pl-0 pr-0">
        <div class="profile-sidebar"> 
          <!-- SIDEBAR USERPIC -->
          <div class="profile-userpic"> <img src="{{ asset('frontend/images/hhoahi.jpg') }}" class="img-responsive d-flex"  alt=""> </div>
          <!-- END SIDEBAR USERPIC --> 
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
            <div class="profile-usertitle-name"> Thanh Hoa </div>
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
              <li class="active" id="wishlist-link"> <a href="{{ route('user.favorite') }}"> <em class="fal fa-heart"></em> Yêu thích </a></li>
              <li> <a href="{{ route('user.delivery') }}"> <i class="fal fa-shipping-fast"></i> Đang giao hàng </a> </li>
            </ul>
          </div>
          <!-- END MENU --> 
        </div>
      </div>
      <div class="col-md-9 responsive-block-2 pl-0 pr-0 pl-3">
        <div class="wrapper-content" id="wrapper-content">

          <div id="wishlist">
            <div class="wishlist-container">
              <div class="wishlist-title"> <i class="fal fa-heart"></i> Sản phẩm yêu thích </div>
              <div class="wishlist-body">
                <div class="wish-item" id="item-wish1">
                  <div class="wish-picture"> <img src="{{ asset('frontend/images/product/dog/royal canin/4372_ava.jpg') }}" style="width: 100%; height auto"> </div>
                  <div class="wish-info d-flex align-self-center"> <a href="html/sanpham/cho/sanpham1.html">Royal Canin Urinary Canine Dog 2kg - Dành cho chó bị sỏi thậnh</a> <br>
                  </div>
                  <div class="item-quality d-flex align-self-center justify-content-center">
                    <div class="wish-quality"> <a href="#" id="unlove"><i class="fal fa-heart-broken"></i></a> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection



