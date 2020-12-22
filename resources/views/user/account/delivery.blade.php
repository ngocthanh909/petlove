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
            <div class="profile-usertitle-name"> Thanh Hoa&nbsp; </div>
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
              <li class="active"> <a href="{{ route('user.delivery') }}"> <i class="fal fa-shipping-fast"></i> Đang giao hàng </a> </li>
            </ul>
          </div>
          <!-- END MENU --> 
        </div>
      </div>
      <div class="col-md-9 responsive-block-2 pl-0 pr-0 pl-3">
        <div class="wrapper-content" id="wrapper-content">
           <div id="profile">
            <div class="profile-title"><i class="fal fa-shipping-fast"></i> Tiến trình giao hàng </div>
            <div class="profile-body">
              <div class="profile-row">
                <div class="row-title">B1. Chuẩn bị hàng: </div>
                <div class="row-content">
                  Đã xong <i class="far fa-check-circle" style="color: green"></i>
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">B2: Giao hàng cho đơn vị vận chuyển:</div>
                <div class="row-content">
                  Đã xong <i class="far fa-check-circle" style="color: green"></i>
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">B3: Chuyển hàng:</div>
                <div class="row-content">
                  Chưa xong <i class="far fa-times-circle" style="color: red"></i>
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">B5: Giao hàng cho Shipper: </div>
                <div class="row-content">
                  Chưa xong <i class="far fa-times-circle" style="color: red"></i>
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">Thời gian giao hàng dự kiến: </div>
                <div class="row-content">
                  5/7/2020
                </div>
              </div>
            </div>
            <center>
            </center>
          </div>  
        </div>
      </div>
    </div>
  </div>
@endsection



