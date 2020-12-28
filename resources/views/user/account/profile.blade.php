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
  @if ($errors->any())
    <div class="alert alert-info" style="background: #B224EF; color: white ; font-size: 16px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  
@endif

@isset($notify)
  <div class="alert alert-info" style="background: #B224EF; color: white ; font-size: 16px">
    dfdf
  </div>
@endisset
    <div class="row profile">
      <div class="col-md-3 pl-0 pr-0">
        <div class="profile-sidebar"> 
          <!-- SIDEBAR USERPIC -->
          <div class="profile-userpic"> <img src="{{session()->get('loginData')['data']['Avatar']}}" class="img-responsive d-flex"  alt=""> </div>
          <!-- END SIDEBAR USERPIC --> 
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
            <div class="profile-usertitle-name"> {{session()->get('loginData')['data']['Name']}} </div>
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
            <form method="post" action="{{ route('user.update.settings') }}">
              @csrf
              <div class="profile-title"><em class="fal fa-user"></em> Thông tin tài khoản </div>
              <div class="profile-body">
                <div class="profile-row">
                  <div class="row-title">Họ và tên:</div>
                  <div class="row-content">
                    <input type="text" value="{{$getAccount->Name}}" name="name">
                  </div>
                </div>
    
                <div class="profile-row">
                  <div class="row-title">Email: </div>
                  <div class="row-content">
                    <input type="email" value="{{$getAccount->Email}}" name="email">
                  </div>
                </div>
                <div class="profile-row">
                  <div class="row-title">SĐT:</div>
                  <div class="row-content">
                    <input type="text" value="{{$getAccount->Phone}}" name="phone">
                  </div>
                </div>
                <div class="profile-row">
                  <div class="row-title">Địa chỉ:</div>
                  <div class="row-content">
                    <input type="text" value="{{$getAccount->Address}}" name="address">
                  </div>
                </div>
              </div>
              <center>
                <button type="submit" class="profile-submit" style="border: none">Sửa hồ sơ</button>
              </center>
            </form>
            <a href="{{ URL::previous() }}"><button type="submit" class="profile-submit" style="border: none; background: #B224EF">< Quay lại trang trước</button></a>
 
          </div>
 
        </div>
      </div>
    </div>
  </div>
@endsection



