@extends('user.layout.layout1')

@section('breadcrumb')
<div class="container">
  <div id="tree">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="">Giỏ hàng</a></li>
  </ul>
  </div>
</div>
@endsection

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-9">
			<div class="cartpage-block">
				<div class="dogcat-sidebar-title">
          			GIỞ HÀNG CỦA TÔI
				</div>
				@if (isset($errorsNotify))
					<h5>Chưa có món hàng nào trong giỏ hàng</h5>
				@endif
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
        					<div class="cartpage-productlist-item-section-delete">
        						<a href="{{ route('user.remove.carts', ['id'=> $item['ProductID']]) }}" id="xoa"><i class="fal fa-trash-alt"></i> Xóa</a>
        					</div>
        				</div>
        				<div class="cartpage-productlist-item-qualityzone">
        						<div class="dpd-block-section-quality">
									<button id="cong" onclick="funcCong({{$item['ProductID']}} , {{$index}})">+</button>
									<input id="soluong{{$index}}" type="text" value="{{$item['Quantity']}}">
									<button id="tru" onclick="funcTru({{$item['ProductID']}} , {{$index}})">-</button>	
        						</div>
        				</div>
        			</div>
					@endforeach
					@endif
				
				
        			
        		</div>
			</div>
		</div>
	
		<div class="col-md-3 pl-0 responsive-block-1">
			<div class="cartpage-block">
				<div class="cartpage-totalandpayment">
					<div class="cartpage-totalandpayment-total">
						<div class="cartpage-totalandpayment-label">Tổng cộng:&nbsp;</div>
					
						<div class="cartpage-totalandpayment-count">{{$totalCarts}}</div>
					</div>
				  <div class="cartpage-totalandpayment-pricepanel mb-3">
						<div class="cartpage-totalandpayment-pricepanel-label">Thành tiền:&nbsp;</div>
						
					<div class="cartpage-totalandpayment-pricepanel-price"><span id="gia">{{number_format($totalPrice, 0, '', ',')}}đ</span></div>
					<p><i>Đã bao gồm phí VAT nếu có</i></p>
					</div>
					
				</div>
				<center><a href="{{ route('user.order.detail') }}"><button type="submit" class="buybtn">Đặt hàng ngay</button></a></center>
				
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	var defaultPrice = document.getElementsByClassName("defaultPrice");
	function funcCong(query,index){
		// var ammout = parseInt(document.getElementById('soluong'+query).value) + 1;
		var _token = $('#token').val();
		$.ajax({
            url:"{{ route('ajax.carts')}}",
            method:"GET", 
            data:{ProductID: query, action: "+" , _token:_token},
            success:function(data){ 
				location.reload();
            }
		});

		// document.getElementById('soluong'+index).value = parseInt(document.getElementById('soluong'+index).value) + 1;
		// updatePrice();
	}

	function funcTru(query,index){

		var _token = $('#token').val();
			$.ajax({
				url:"{{ route('ajax.carts')}}",
				method:"GET", 
				data:{ProductID: query, action: "-" , _token:_token},
				success:function(data){ 
					location.reload();
				}
			});

		
		
	}
</script>
{{-- <script src="{{ asset('frontend/js/scripts.js') }}"></script> --}}
@endpush