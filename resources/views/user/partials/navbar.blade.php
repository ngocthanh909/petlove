<nav class="navbar navbar-expand-xl navbar-dark bg-dark sticky-top"><a href="{{ route('user.index') }}" class="navbar-brand"><img
    src="{{ asset('frontend/images/logo-petlove.svg') }}" alt="petlove logo" class=""></a>
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"> <span
    class="navbar-toggler-icon"></span> </button>
<!-- Collection of nav links, forms, and other content for toggling -->
<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
  <form class="navbar-form form-inline" onsubmit="return false">
    <div class="input-group search-box">
      <input type="text" id="search" class="form-control" placeholder="Tìm kiếm...">
      <button id="searchbtn" class="input-group-addon"><i class="fal fa-search"></i></button>
    </div>
  </form>
  <div class="navbar-nav ml-auto"> <a href="{{ route('user.index') }}" class="nav-item nav-link active"><i
        class="fa fa-home"></i><span>Trang chủ</span></a> <a href="{{ route('user.collection', ['tendanhmuc'=>'all']) }}" class="nav-item nav-link"><i
        class="fas fa-bags-shopping"></i><span>Gian hàng</span></a><a href="{{ route('user.blog') }}" class="nav-item nav-link"><i
        class="fas fa-book"></i><span>Blog và tin tức</span></a> <a href="{{ route('user.carts') }}" class="nav-item nav-link"><i
        class="fad fa-shopping-cart"></i><span>Giỏ hàng</span></a> <a href="{{ route('user.favorite') }}"
      class="nav-item nav-link"><i class="fad fa-box-heart"></i><span>Yêu thích</span></a> <a href="{{ route('user.about') }}"
      class="nav-item nav-link"><i class="fas fa-info-circle"></i><span>Về chúng tôi</span></a>
    <div class="nav-item dropdown"> <a href="#" data-toggle="dropdown"
        class="nav-item nav-link dropdown-toggle user-action"><img src="{{ asset('frontend/images/hhoahi.jpg') }}"
          class="avatar rounded-circle" alt="Avatar"> Thanh Hoa <strong class="caret"></strong></a>
      <div class="dropdown-menu"> <a href="{{ route('user.settings') }}" class="dropdown-item"><i class="fal fa-address-card"></i>
          Hồ sơ</a> <a href="{{ route('user.delivery') }}" class="dropdown-item"><i class="fal fa-truck"></i> Tiến độ giao hàng</a>
        <a href="{{ route('user.favorite') }}" class="dropdown-item"><i class="fad fa-box-heart"></i> Yêu thích</a>
        <div class="divider dropdown-divider"></div>
        <a href="login.html" class="dropdown-item"><i class="fal fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </div>
</div>
</nav>