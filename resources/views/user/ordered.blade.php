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
            <div id="done-form">
                <div class="order-sucess">
                    <div class="order-success-img">
                        <img src="{{ asset('frontend/images/paid/kisspng-pembroke-welsh-corgi-cardigan-welsh-corgi-sticker-corgis-because-im-sad-5badb105e50a67.8824204715381097019382.png') }}">
                    </div>
                    <div class="order-success-text">Cảm ơn <span>{{session()->get('loginData')['data']['Name']}}</span> đã đặt hàng <i style="color: #F24783" class="fad fa-heart"></i></div>
                    <div class="order-success-text-secondary">Bạn có thể kiểm tra tiến độ đơn hàng tại <a href="{{ route('user.delivery') }}">đây</a></div>
                </div>
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

