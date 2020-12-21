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
	<div class="row">
		<div class="col-md-9">
			<div class="cartpage-block">
				<div class="dogcat-sidebar-title">
          			GIỞ HÀNG CỦA TÔI
        		</div>
        		<div class="cartpage-productlist">
        			<div id="item" class="cartpage-productlist-item">
        				<div class="cartpage-productlist-item-img">
        					<img src="{{ asset('frontend/images/product/dog/royal canin/4372_ava.jpg') }}">
        				</div>
        				<div class="cartpage-productlist-item-section">
        					<div class="cartpage-productlist-item-section-name">
        						<a href="html/sanpham/cho/sanpham1.html">Royal Canin Urinary Canine Dog 2kg - Dành cho chó bị sỏi thận</a>
        					</div>
        					<div class="cartpage-productlist-item-section-price">
        						<span>100.000</span><span> VNĐ</span>
        					</div>
        					<div class="cartpage-productlist-item-section-delete">
        						<a href="#" id="xoa"><i class="fal fa-trash-alt"></i> Xóa</a>
        					</div>
        				</div>
        				<div class="cartpage-productlist-item-qualityzone">
        						<div class="dpd-block-section-quality">
									<button id="cong">+</button>
									<input id="soluong" type="text" value="1">
									<button id="tru">-</button>	
        						</div>
        				</div>
        			</div>
        			
        		</div>
			</div>
		</div>
		<div class="col-md-3 pl-0 responsive-block-1">
			<div class="cartpage-block">
				<div class="cartpage-totalandpayment">
					<div class="cartpage-totalandpayment-total">
						<div class="cartpage-totalandpayment-label">Tổng cộng:&nbsp;</div>
						<div class="cartpage-totalandpayment-count">1</div>
					</div>
				  <div class="cartpage-totalandpayment-pricepanel mb-3">
						<div class="cartpage-totalandpayment-pricepanel-label">Thành tiền:&nbsp;</div>
					<div class="cartpage-totalandpayment-pricepanel-price"><span id="gia">435000</span><span>đ</span></div>
					<p><i>Đã bao gồm phí VAT nếu có</i></p>
					</div>
					
				</div>
				<center><button type="submit" class="buybtn" onClick="location.href = 'order.html';">Đặt hàng ngay</button></center>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script src="{{ asset('frontend/js/scripts.js') }}"></script>
@endpush