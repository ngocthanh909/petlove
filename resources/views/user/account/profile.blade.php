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
              <li  class="active" id="profile-link"> <a href="{{ route('user.settings') }}"><i class="fal fa-user"></i>Tài khoản </a> </li>
              <li id="wishlist-link"> <a href="{{ route('user.favorite') }}"> <em class="fal fa-heart"></em> Yêu thích </a></li>
              <li> <a href="{{ route('user.delivery') }}"> <i class="fal fa-shipping-fast"></i> Đang giao hàng </a> </li>
            </ul>
          </div>
          <!-- END MENU --> 
        </div>
      </div>
      <div class="col-md-9 responsive-block-2 pl-0 pr-0 pl-3">
        <div class="wrapper-content" id="wrapper-content">
          <div id="profile">
            <div class="profile-title"><em class="fal fa-user"></em> Thông tin tài khoản </div>
            <div class="profile-body">
              <div class="profile-row">
                <div class="row-title">Họ và tên:</div>
                <div class="row-content">
                  <input type="text" value="Thanh Hoa">
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">Ngày sinh:</div>
                <div class="row-content">
                  <input type="date" value="1999-10-05">
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">Email: </div>
                <div class="row-content">
                  <input type="email" value="thanhstp99@gmail.com">
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">SĐT:</div>
                <div class="row-content">
                  <input type="text" value="0347539143">
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">Địa chỉ:</div>
                <div class="row-content">
                  <input type="text" value="Thôn Ngân Điền, Xã Sơn Hà, Huyện Sơn Hòa, Tỉnh Phú Yên">
                </div>
              </div>
            </div>
            <center>
              <a href="#" class="profile-submit">Sửa hồ sơ</a>
            </center>
          </div>
 
        </div>
      </div>
    </div>
  </div>
@endsection



