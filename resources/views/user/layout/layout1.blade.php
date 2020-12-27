<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Petlove - Shop thú cưng trực tuyến</title>
  <!--CSS-->
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/styles.css')}} ">
  <link rel="stylesheet" href="{{ asset('frontend/css/navbar.css')}} ">
  <link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css')}}">
  <!--Script-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
  <script src="{{ asset('frontend/js/navbar.js') }}"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{ asset('frontend/images/favicon/favicon.ico') }}">

  <!-- End User Define-->
  <style></style>
  @stack('css')
</head>

<body>
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <!--Navbar-->
  @include('user.partials.navbar');

  <!--Sidebar-->
  @include('user.partials.sidebar');
  
  <!--Model---->
  @stack('model')
  <!-- Ko có kết quả -->
  <div class="modal fade" id="modalFalse">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Kết quả tìm kiếm</h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <p>Không có sản phẩm nào trùng khớp với từ khoá&nbsp;<span id="keywordfalse"></span></p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>

      </div>
    </div>
  </div>
  <!-- Có kết quả -->
  <div class="modal fade" id="modalTrue">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Kết quả tìm kiếm</h5>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <p>Tìm thấy&nbsp;<span>1</span>&nbsp;kết quả cho từ khoá&nbsp;<span id="keywordtrue"></span></p>
          <div class="cartpage-productlist">
            <div id="item" class="cartpage-productlist-item">
              <div class="cartpage-productlist-item-img">
                <img src="{{ asset('frontend/images/product/dog/royal canin/4372_ava.jpg') }}">
              </div>
              <div class="cartpage-productlist-item-section">
                <div class="cartpage-productlist-item-section-name">
                  <a href="html/sanpham/cho/sanpham1.html">Royal Canin Urinary Canine Dog 2kg - Dành cho chó bị sỏi
                    thận</a>
                </div>
                <div class="cartpage-productlist-item-section-price">
                  <span>100.000</span><span> VNĐ</span>
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

  <script>
    $(document).ready(function () {
      $("#searchbtn").click(function () {
        var key = document.getElementById("search").value;
        if (key == "royal") {
          var keywordtrue = document.getElementById("keywordtrue").innerHTML = key;
          $("#modalTrue").modal();
        } else {
          var keywordfalse = document.getElementById("keywordfalse").innerHTML = key;
          $("#modalFalse").modal();
        }
      });
    });
  </script>


    <!--Breadcrumb-->
    @yield('breadcrumb')
    @yield('content');
  <!--===============FOOTER==============-->
  @include('user.partials.footer');
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="far fa-arrow-to-top"></i>&nbsp;Về đầu
    trang</button>
</body>






<script>
  //Get the button
  var mybutton = document.getElementById("myBtn");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () { scrollFunction() };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }


</script>


<script type="text/javascript">
  $(document).ready(function () {
      $("#sidebar").mCustomScrollbar({
          theme: "minimal"
      });

      $('#dismiss, .overlay').on('click', function () {
          $('#sidebar').removeClass('active');
          $('.overlay').removeClass('active');
      });

      $('#sidebarCollapse').on('click', function () {
          $('#sidebar').addClass('active');
          $('.overlay').addClass('active');
          $('.collapse.in').toggleClass('in');
          $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
  });
</script>

<script>
  function openSidebar() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeSidebar() {
    document.getElementById("mySidenav").style.width = "0";
  }

  var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
  </script>

@stack('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</html>