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
    <div class="dpd-block1">
      <div class="row">
        <div class="col-md-7">
          <div class="dpd-block1-img" id="img-container"> <img id="myImg" src="/{{$product->Avatar}}" alt="{{$product->Name}}"> </div>
         <!-- The Modal -->
  <div id="img-modal" class="modal1">
    <span class="close1" onClick="closemodal()">&times;</span>
    <img class="modal-content1 img-fluid" id="img01">
    <div id="caption"></div>
  </div>
          
        </div>
        <div class="col-md-5">
          <div class="dpd-block-section">

            <div class="dpd-block-section-pname"> <span>{{$product->Name}}</span> </div>

            <div class="dpd-block-section-brand"> <span class="label">Thương hiệu: </span> <span class="brand">{{$brand}}</span> </div>
            <div class="dpd-block-section-pid"> <span class="label">Mã sản phẩm: </span> <span class="id">{{$product->Sku}}</span> </div>
            {!!$htmlRate!!}
            <span>Có {{$rateCount}} người dùng đánh giá</span>

            
            <div class="dpd-block-section-price"> <span>{{$product->Price}}</span><span> VNĐ</span><br>
            </div>
            <div class="dpd-block-section-quality">
              <button id="cong">+</button>
              <input id="soluong" type="text" value="1">
              <button id="tru">-</button>
            </div>
            <div class="dpd-block-section-furtherinfo"> <span><b>Miễn phí giao hàng trong nội thành Đà Nẵng</b> </span><span><a href="#" data-toggle="modal" data-target="#myModal3">( Xem chính sách )</a></span>
              <p>Có: <span>69 </span> người đã mua sản phẩm này</p>
            </div>
            <form action="{{ route('user.add.carts') }}" method="post">
              @csrf
              <input disabled value="{{$product->Sku}}" name="sku">
              <input disabled id="soluongform" name="soluong">
              <button type="submit" class="btn-buy shadow-hover"><i class="fal fa-shopping-cart"></i>Thêm vào giỏ</button>

            </form>
  
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-7 pt-3">
        <div class="dpd-block1">
          <div class="dpd-block-info">
            <div class="dpd-block-info-nav">
              <ul>
                <li id="chitiet" class="active"><a href="#tab-1">Chi tiết</a></li>
                <li id="phanhoi"><a href="#tab-2">Phản hồi</a></li>
                <li id="danhgia"><a href="#tab-3">Xem đánh giá</a></li>
              </ul>
            </div>
            <div class="dpd-block-info-panel" id="blank-panel"> </div>
            <div id="tab-1" style="">
              {!!$product->Description!!}
            </div>
            <div id="tab-2">
              <div class="dpd-comment-form">
                <p style="margin-bottom: 10px; font-size: 16px"><b>Bình luận</b></p>
                <p>
                  <input type="text" style="width: 49%" placeholder="Tên của bạn">
                  <input type="email" style="width: 49%" placeholder="Địa chỉ email">
                </p>
                <p style="margin-top: 10px;">Đánh giá sản phẩm của chúng tôi:
                <div id="rating">
                  <input type="radio" id="star5" name="rating" value="5" />
                  <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                  <input type="radio" id="star4" name="rating" value="4" />
                  <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                  <input type="radio" id="star3" name="rating" value="3" />
                  <label class = "full" for="star3" title="Meh - 3 stars"></label>
                  <input type="radio" id="star2" name="rating" value="2" />
                  <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                  <input type="radio" id="star1" name="rating" value="1" />
                  <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                </div>
                </p>
                <p><br>
                  <textarea placeholder="Bình luận của bạn" style="width: 100%"></textarea>
                </p>
                <p>
                  <button class="btn-buy" type="reset" data-toggle="modal" data-target="#myModal4">Gửi đi</button>
                </p>
              </div>
            </div>
            <div id="tab-3">
              <div class="media">
                <div class="media-left"> <img src="{{ asset('frontend/images/user/95853632_1288908511314610_6236089456328179712_n.jpg') }}" class="media-object" style="width:60px"> </div>
                <div class="media-body">
                  <h6 class="media-heading">Thanh Do</h6>
                  <p>
                  <ul class="rating" style="text-align: left">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                  </ul>
                  </p>
                  <p>Sản phẩm chất lượng lắm mọi người ạ! Thích thì mua, không thích thì mua nha :3</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 pl-0 mt-3 mob-margin-left">
        <div class="dpd-block1">
          <div class="topproduct-title">
            <h5>Sản phẩm <strong>Hàng đầu</strong></h5>
          </div>
          <div class="topproduct-body">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/product/product2.jpg') }}"><span class="badge-top">#1</span></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="sanpham1.html">Thức ăn cho chó con</a></div>
              <div class="topproduct-section-price">500.000VNĐ</div>
              <div class="topproduct-rate">
                <ul class="rating" style="text-align: left">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </div>
            </div>
          </div>
          <!--        ==============================-->
          <div class="topproduct-body">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/product/product1.jpg') }}"><span class="badge-top">#2</span></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="sanpham1.html">Thức ăn chó trưởng thành</a></div>
              <div class="topproduct-section-price">500.000VNĐ</div>
              <div class="topproduct-rate">
                <ul class="rating" style="text-align: left">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </div>
            </div>
          </div>
          <!--        ==============================-->
          <div class="topproduct-body no-boder-bottom">
            <div class="topproduct-body-picture"><img src="{{ asset('frontend/images/product/dog/royal canin/4372_ava.jpg') }}"><span class="badge-top">#3</span></div>
            <div class="topproduct-body-section">
              <div class="topproduct-section-title"><a href="sanpham1.html">Royal Canin Urinary Canine Dog</a></div>
              <div class="topproduct-section-price">500.000VNĐ</div>
              <div class="topproduct-rate">
                <ul class="rating" style="text-align: left">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </div>
            </div>
          </div>
          <!--        ==============================--> 
        </div>
      </div>
    </div>
  </div>
@endsection

@push('css')
<style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }
    #myImg:hover {
        opacity: 0.7;
    }
    /* The Modal (background) */
    .modal1 {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        overflow: hidden;
    }
    /* Modal Content (image) */
    .modal-content1 {
        margin: auto;
        display: block;
    /*
        width: 80%;
        max-width: 700px;
    */
        height: 90%;
        width: auto;
    }
    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }
    /* Add Animation */
    .modal-content1, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }
    @-webkit-keyframes zoom {
    from {
    -webkit-transform:scale(0)
    }
    to {
    -webkit-transform:scale(1)
    }
    }
    @keyframes zoom {
    from {
    transform:scale(0)
    }
    to {
    transform:scale(1)
    }
    }
    /* The Close Button */
    .close1 {
        position: absolute;
        bottom: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    .close1:hover, .close1:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    
    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
    .modal-content1 {
        width: 100%;
    }
    }
    </style>
@endpush


@push('scripts')
<script>
    // Get the modal
    var modal = document.getElementById("img-modal");
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }
    function closemodal() {
        modal.style.display = "none";
    }
    </script>
    </body>
    <script>
    function calcRate(r) {
     const f = ~~r,//Tương tự Math.floor(r)
     id = 'star' + f + (r % f ? 'half' : '')
     id && (document.getElementById(id).checked = !0)
    }
    </script>
    <script>

    //	$("#tab-1").hide();
        $("#tab-2").hide();
        $("#tab-3").hide();
    $("#chitiet").click(function(){
        $("#tab-2").hide();
        $("#tab-3").hide();
        
        $("#tab-1").show();
        
        $("#danhgia").removeClass("active");
        $("#phanhoi").removeClass("active");
        $("#chitiet").addClass("active");
    });
        
    $("#phanhoi").click(function(){
        $("#tab-1").hide();
        $("#tab-3").hide();
        
        $("#tab-2").show();
        
        $("#chitiet").removeClass("active");
        $("#phanhoi").addClass("active");
        $("#danhgia").removeClass("active");
    });
        $("#danhgia").click(function(){
        $("#tab-1").hide();
        $("#tab-2").hide();
        
        $("#tab-3").show();
        
        $("#chitiet").removeClass("active");
        $("#phanhoi").removeClass("active");
        $("#danhgia").addClass("active");
    });

    $("#cong").click(function(){
      var temp = document.getElementById("soluong").value;
      var qual = Number(temp);
      qual += 1;
      document.getElementById("soluong").value = qual;
      document.getElementById("soluongform").value = qual;
    });
    $("#tru").click(function(){
      var temp = document.getElementById("soluong").value;

      var qual = Number(temp);
      qual -= 1;
      if (qual != 0){
        document.getElementById("soluong").value = qual;
        document.getElementById("soluongform").value = qual;
      }


    
    });

    </script>

    

    <script src="{{ asset('frontend/js/js-image-zoom.js') }}"></script> 
    <script src="https://unpkg.com/js-image-zoom@0.4.1/js-image-zoom.js" type="application/javascript"></script>
@endpush




@push('model')
<div class="modal" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Chính sách</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="width: 100%">
          <div class="container mt-3">
            <div class="row">
              <div class="col-12">
                <div class="pf-box default-block shadow-hover"> <img src="{{ asset('frontend/images/home/Feature Image/free-delivery.svg') }}">
                  <center>
                    <h5>Miễn phí giao hàng</h5>
                    <p>Áp dụng cho nội thành Đà Nẵng</p>
                  </center>
                </div>
              </div>
              <div class="col-12">
                <div class="pf-box default-block resposive-margin shadow-hover"> <img src="{{ asset('frontend/images/home/Feature Image/same-day-delivery.svg') }}">
                  <center>
                    <h5>Khách hàng thân thiết</h5>
                    <p>Tích điểm để nhận nhiều ưu đãi</p>
                  </center>
                </div>
              </div>
              <div class="col-12">
                <div class="pf-box default-block resposive-margin shadow-hover"> <img src="{{ asset('frontend/images/home/Feature Image/credit-card.svg') }}">
                  <center>
                    <h5>Sản phẩm chất lượng</h5>
                    <p>Đối tác hàng trăm nhãn hàng nổi tiếng</p>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal 1-->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Giỏ hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body"> Đã thêm vào danh sách yêu thích </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal 2-->
  <div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Giỏ hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body"> Đã thêm vào giỏ thành công! Bạn có thể tiếp tục chọn sản phẩm hoặc thanh toán ngay </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="background: #B224EF">Tiếp tục mua sắm</button>
          <button type="button" class="btn btn-success" style="background: #F24783" data-dismiss="modal"  onClick="location.href = '../../../cart.html';">Thanh toán ngay</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="myModal4">
    <div class="modal-dialog">
      <div class="modal-content"> 
        
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Bình luận</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body"> Đăng bình luận thành công! </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
@endpush