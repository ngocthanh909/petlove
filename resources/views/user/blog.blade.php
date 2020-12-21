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
      <div class="col-md-8">
        <div class="default-block p-4">
          <div class="title-block mb-3">
            <h5>BÀI VIẾT <b>NỔI BẬT</b></h5>
          </div>
          <div class="blog-picture"> <img src="{{ asset('frontend/images/Anhnen2.jpg') }}" class="img-fluid"> </div>
          <div class="blog-section">
            <p>
            <a href="html/blog/blog0.html">
            <h4>Mẹo chụp ảnh đẹp cho thú cưng của bạn</h4>
            </a>
            </p>
            <p>Là một người yêu thú nuôi, chắc chắn bạn sẽ muốn lưu lại những kỷ niệm đẹp, hay khoảnh khắc hiếm có bên cạnh chúng. Dưới đây là một vài mẹo hay của nhiếp ảnh gia động vật - Mark Rogers để chụp ảnh cho thú cưng của mình được tự nhiên nhất, hài hước và đáng yêu nhất nhé.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 pl-0 responsive-block-1">
        <div class="default-block p-4">
          <div class="title-block mb-3">
            <h5>BÀI VIẾT <b>MỚI NHẤT</b></h5>
          </div>
          <div class="topproduct-body">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/cover.5e5b5575a108d.jpg') }}"></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="html/blog/blog1.html">Top 5 dòng chó tai dài được ưa chuộng nhất Việt Nam</a></div>
              <p>Giống chó Teacup Poodle siêu dễ thương chỉ nhỏ bằng một ly trà... </p>
            </div>
          </div>
          <div class="topproduct-body">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/cover.5e326ecb9a86e.jpg') }}"></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="html/blog/blog2.html">Chó Mang Thai Bao Lâu Thì Đẻ?</a></div>
              <p>Chó mang bầu mấy tháng đẻ? Câu hỏi này chắc được rất nhiều "ông bà ngoại" quan tâm... </p>
            </div>
          </div>
          <div class="topproduct-body">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/cover.5e44b5bd154a2.jpg') }}"></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="html/blog/blog3.html">Nhận biết chó có thai</a></div>
              <p>Sẽ tuyệt vời hơn nếu sen có thể phát hiện ra những thay đổi về bề ngoài cũng như hành xử ... </p>
            </div>
          </div>
          <div class="topproduct-body">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/cover.5e4fe8409adbb.jpg') }}"></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="html/blog/blog4.html">Phải làm gì khi cún yêu tiêu chảy?</a></div>
              <p>Tiêu chảy là bệnh khá phổ biến ở cún yêu. Nếu áp dụng đúng biện pháp chữa trị, bệnh ... </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection