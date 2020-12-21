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
<div class="bg-light">
    <div class="container py-5">
      <div class="row h-100 align-items-center py-5">
        <div class="col-lg-6">
          <h1 class="display-4">Về chúng tôi</h1>
          <p class="lead text-muted mb-0">Chúng tôi là Petlove - một thương hiệu xuất hiện trên thị trường Việt Nam từ 2015. Sứ mệnh của chúng tôi là mang đến cho các bạn những sản phẩm chất lượng nhất cho thú cưng của bạn!&nbsp; &nbsp;</p>
        </div>
        <div class="col-lg-6 d-none d-lg-block"><img src="{{ asset('frontend/images/newsletter_poppup_670x400_crop_top.jpg') }}" alt="" class="img-fluid"></div>
      </div>
    </div>
  </div>
  
  <div class="bg-white py-5">
    <div class="container py-5">
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 order-2 order-lg-1">
          <h2 class="font-weight-light">Mua sắm tiện lợi với 1 cú click!&nbsp;</h2>
          <p class="font-italic text-muted mb-4">&nbsp;Dù "Sen" có bận rộn đến đâu cũng không thành vấn đề. Chỉ cần cú click "Sen" đã có thể thoải mái mua sắm rồi. Trang web của chúng tôi có hàng ngàn sản phẩm cho các bạn lựa chọn. Giao hàng tận nơi miễn phí cho các "Sen" trong nội thành Đà Nẵng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
          <a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Tìm hiểu thêm&nbsp;</a>
        </div>
        <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{ asset('frontend/images/—Pngtree—pet dog red dogs_1821721.png') }}" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-5 px-5 mx-auto"><img src="{{ asset('frontend/images/custom_image.jpg') }}" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        <div class="col-lg-6">
          <h2 class="font-weight-light">Giao hàng tận nơi</h2>
          <p class="font-italic text-muted mb-4">Giao hàng nhanh chóng, sản phẩm đến tận tay bạn. Ngoài ra chúng tôi còn có chính sách miễn phí giao hàng trong nội thành Đà Nẵng</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Tìm hiểu thêm&nbsp;</a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="bg-light py-5">
    <div class="container py-5">
      <div class="row mb-4">
        <div class="col-lg-5">
          <h2 class="display-4 font-weight-light">Team chúng tôi</h2>
          <p class="font-italic text-muted">Những bạn trẻ nhiệt huyết và đặc biệt dành 1 tình yêu to bự với động vật</p>
        </div>
      </div>
  
      <div class="row text-center">
        <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('frontend/images/user/95853632_1288908511314610_6236089456328179712_n.jpg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Thanh Đỗ</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
            <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item"><a href="http://facebook.com/ngocthanh909" class="social-link"><i class="fab fa-facebook"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- End-->
  
        <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('frontend/images/hhoahi.jpg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Hạnh Hòa</h5><span class="small text-uppercase text-muted">Designer</span>
            <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item"><a href="http://facebook.com/hanhhoatranthi" class="social-link"><i class="fab fa-facebook"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- End-->
  
        <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-2_f8dowd.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Tom Sunderland</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
            <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- End-->
  
        <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">John Tarly</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
            <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- End-->
  
      </div>
    </div>
  </div>
  
@endsection