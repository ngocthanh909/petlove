@extends('user.layout.layout1')

@section('breadcrumb')
<div class="container">
  {{-- <div id="tree">
  <ul class="breadcrumb" >
    <a><i class="fa fa-home"></i></a>
    @foreach (array_reverse($categoriesArr) as $category)
      @foreach(explode('|', $category) as $key=>$item)
        @if($key == 0)
          <li class="breadcrumb-item"><a href="{{ route('user.collection', $item) }}">
    
        @elseif($key == 1)
          <span>{{ $item }}<span></a></li>
            
        @endif
      @endforeach
    @endforeach
    <li class="breadcrumb-item"><a href=""><span>{{$product->Name}}<span></a></li>
  
    
  </ul>
  </div> --}}
</div>

@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="orderblock">
          <div class="order-sidebar">
            <div class="order-sidebar-img"><img src="{{ asset('frontend/images/orderpage/—Pngtree—female customers shopping online vector_5347768.png') }}"></div>
            <div class="order-sidebar-processblock">
              <ul>
                <li id="login-link" class="done"><a href="#" onClick="alert('Bạn đã đang nhập trước đó')"><i class="fal fa-sign-in-alt"></i>&nbsp; Đăng nhập</a></li>
                <li id="profile-link"  class="active"><a href="#"><i class="fal fa-info-circle"></i>&nbsp; Thông tin cá nhân</a></li>
                <li id="sucess-link"><a href="#"><i class="fal fa-box-check"></i>&nbsp;Hoàn tất</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9 pl-0 ">


        <div class="cartpage-block responsive-block-1">
            <div id="profile-form">
                <div class="dogcat-sidebar-title"><i class="fal fa-info-circle"></i>&nbsp;ĐƠN HÀNG</div>
              
                <div class="cartpage-productlist">
					@php
          $totalCarts = 0;
          $totalPrice = 0;
					@endphp
					@if (Session::get('cartsData') != null)
					@foreach (Session::get('cartsData') as $index => $item)
					@php
            $totalCarts += $item['Quantity'];
            $totalPrice += $item['ProductPrice'] * $item['Quantity'];
					@endphp
					<div id="item" class="cartpage-productlist-item">
        				<div class="cartpage-productlist-item-img">
        					<img src="{{ asset('frontend/images/product/dog/royal canin/4372_ava.jpg') }}">
        				</div>
        				<div class="cartpage-productlist-item-section">
        					<div class="cartpage-productlist-item-section-name">
        						<a href="san-pham/">{{$item['ProductName']}}</a>
        					</div>
        					<div class="cartpage-productlist-item-section-price">
								<input class="defaultPrice" hidden id="defaultPrice{{$index}}" value="{{$item['ProductPrice']}}">
        						<span>{{number_format($item['ProductPrice'], 0, '', ',')}}</span><span> VNĐ</span>
        					</div>
        				</div>
        				<div class="cartpage-productlist-item-qualityzone">
        						<div class="dpd-block-section-quality">
                                  
							
									<span>Số lượng: </span><input id="soluong{{$index}}" disabled type="text" value="{{$item['Quantity']}}">
						
        						</div>
        				</div>
        			</div>
					@endforeach
					@endif
                    <br>
        
                    <div class="cartpage-totalandpayment-pricepanel mb-3">
                      <div class="cartpage-totalandpayment-pricepanel-label">Thành tiền:&nbsp;</div>
                      
                    <div class="cartpage-totalandpayment-pricepanel-price"><span id="gia">{{number_format($totalPrice, 0, '', ',')}}đ</span></div>
                    <p><i>Đã bao gồm phí VAT nếu có</i></p>
                    </div>
        			
        		</div>
            </div>
          <div id="profile-form">
            <div class="dogcat-sidebar-title"><i class="fal fa-info-circle"></i>&nbsp;THÔNG TIN CÁ NHÂN</div>
            <br>
            <span>Vui lòng kiểm tra lại thông tin cá nhân của bạn , hàng của bạn sẽ được giao đến địa chỉ này</span>
            <div class="profile-body ml-3">
              <div class="profile-row">
                <div class="row-title">Họ và tên:</div>
                <div class="row-content">
                  <input type="text" readonly value="{{$getAccount->Name}}">
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">Email:</div>
                <div class="row-content">
                  <input type="email" readonly value="{{$getAccount->Email}}">
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">SĐT:</div>
                <div class="row-content">
                  <input type="text" readonly value="{{$getAccount->Phone}}">
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">Địa chỉ giao:</div>
                <div class="row-content">
                  <input type="text" readonly value="{{$getAccount->Address}}">
                </div>
              </div>
              <div class="profile-row">
                <div class="row-title">Phương thức: </div>
                <div class="row-content">
                    <span>Ship cod</span>
                  </div>
              </div>
            </div>
            <center>
              <a id="profile-done" href="{{ route('user.submit.order') }}" class="profile-submit">Đặt hàng</a>
              <a id="profile-done" href="{{ route('user.settings') }}" class="profile-submit" style="background:#B224EF">Sửa hồ sơ</a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>

</script>
@endpush

@push('css')
<style>

</style>
@endpush

