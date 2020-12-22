<!DOCTYPE html>
<html>
<head>
    <title>@yield('tittle')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{asset('assets/user/js/script.js')}}"></script>
</head>
<body>
    <!--Search Bar For Desktop-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="margin-top: 120px;">
                <input class="form-control" placeholder="Nhập vào sản phẩm bạn cần tìm">
            </div>
        </div>
    </div>
    <!--End Search Bar For Desktop-->
    <div class="level2" id="categoriesExpand" style="margin-top: 55px;">
        <div class="container">

            <div class="dropdown">
                {{-- <h5 class="level2-root">Shop cho chó</h5> --}}
                <div class="dropdown-content">
                    <div class="downdown-row">
                        @foreach($categories as $category)
                        <div>
                        <ul><li><span class="level2-sub-root"><i class="fas fa-square"></i>{{$category->Name}}</span></li>
                            @include('user.layouts.categoryselect', ['category' => $category, 'no' => $char = ''])
                        </ul>
                        </div>
                        @endforeach   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{asset('assets/user/img/header-logo.svg')}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="nav-wrapper">
                    <ul class="navbar-nav mr-auto">
                        <div class="tab-nav-desktop">
                            <!--Nav For Desktop-->
                            <li class="nav-item active">
                                <a class="nav-link" href="#">trang chủ <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="showCategories()">danh mục sản phẩm</a>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#test').click(function() {
                                            alert('test')
                                        })
                                    })
                                </script>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">blog và tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">liên hệ</a>
                            </li>
                        </div>
                        <!--Nav For Mobile-->
                        <div class="tab-nav-mobile">
                            <div id="tab-nav" class="tabcontent">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">trang chủ <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">danh mục sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">blog và tin tức</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">liên hệ</a>
                                </li>
                            </div>
                            <div id="tab-search" class="tabcontent">
                                <input class="form-control" type="text" placeholder="Nhập vào sản phẩm bạn cần tìm">
                            </div>

                            <div id="tab-fav" class="tabcontent">
                                Danh sách trống
                            </div>

                            <div id="tab-carts" class="tabcontent">
                                <div class="container-fluid" style="background-color: white; border-radius: 25px; margin-top: 20px;">
                                    <table width="100%">
                                        <tr>
                                            <td rowspan="2"><img src="https://www.petcity.vn/media/product/4458_dc8eeacd86a7f0c396b13b01c6c2ec40.jpg" height="40px"></td>
                                            <td>Thức ăn Pedigree Adlut...</td>
                                            <td class="price">179.000đ</td>
                                        </tr>
                                        <tr>
                                            <td class="simple-menu-des">Phân loại hàng: 40</td>
                                            <td style="text-align: right;">Xóa</td>
                                        </tr>
                                        <td>
                                            <div class="spacer"></div>
                                        </td>
                                        <tr>
                                            <td rowspan="2"><img src="https://www.petcity.vn/media/product/4458_dc8eeacd86a7f0c396b13b01c6c2ec40.jpg" height="40px"></td>
                                            <td>Thức ăn Pedigree Adlut...</td>
                                            <td class="price">179.000đ</td>
                                        </tr>
                                        <tr>
                                            <td class="simple-menu-des">Phân loại hàng: 40</td>
                                            <td style="text-align: right;">Xóa</td>
                                        </tr>

                                    </table>
                                </div>

                            </div>
                            <div id="tab-users" class="tabcontent">
                                <div class="user-card shadow p-3">
                                    <h5>Chào bạn: Phan Văn Quốc Tuấn</h5>
                                </div>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#"><i class="fas fa-user-cog"></i> cài đặt tài khoản</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> đăng xuất</a>
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
                <!--Nav Buttons For Handling Events-->
                <div class="nav-controller">
                    <div class="hid-on--desktop">
                        <button class="nav-button nav-button--wide" onclick="openNav(event,'tab-nav')">
                            <span class="fas fa-network-wired"></span>
                        </button>
                    </div>
                    <button class="nav-button nav-button--wide" onclick="openNav(event,'tab-search')">

                        <span class="fas fa-search"></span>
                        <span class="count hid-on--mobile" data-toggle="modal" data-target="#exampleModal">Tìm kiếm</span>
                    </button>
                    <span style="color: white;" class="hid-on--mobile">|</span>
                    <button class="nav-button nav-button--wide" onclick="openNav(event,'tab-fav')">
                        <span class="fa fa-bell"></span>
                        <span class="count">0</span>
                    </button>

                    <button class="nav-button nav-button--wide" style="margin-right: 10px;" onclick="openNav(event,'tab-carts')">

                        <span class="fas fa-shopping-cart"></span>
                        <span class="count">0</span>
                    </button>

                    <div class="nav-button avatar" onclick="openNav(event,'tab-users')"></div>
                    <!--End Nav Buttons For Handling Events-->


                    <!--Popovers-->
                    <!--Popovers Favorites For Desktop-->
                    <div class="simple-menu" id="tab-fav-desktop" style="transform: translateX(-40px);">
                        Test
                    </div>
                    <!--Popovers Carts For Desktop-->
                    <div class="simple-menu shadow-sm p-3 mb-5" id="tab-carts-desktop" style="transform: translateX(40px); width: 350px;">
                        <span class="simple-menu-header">Sản phẩm mới thêm</span>
                        <hr>
                        <table width="100%">
                            <tr>
                                <td rowspan="2"><img src="https://www.petcity.vn/media/product/4458_dc8eeacd86a7f0c396b13b01c6c2ec40.jpg" height="40px"></td>
                                <td>Thức ăn Pedigree Adlut...</td>
                                <td class="price">179.000đ</td>
                            </tr>
                            <tr>
                                <td class="simple-menu-des">Phân loại hàng: 40</td>
                                <td style="text-align: right;">Xóa</td>
                            </tr>
                            <td>
                                <div class="spacer"></div>
                            </td>
                            <tr>
                                <td rowspan="2"><img src="https://www.petcity.vn/media/product/4458_dc8eeacd86a7f0c396b13b01c6c2ec40.jpg" height="40px"></td>
                                <td>Thức ăn Pedigree Adlut...</td>
                                <td class="price">179.000đ</td>
                            </tr>
                            <tr>
                                <td class="simple-menu-des">Phân loại hàng: 40</td>
                                <td style="text-align: right;">Xóa</td>
                            </tr>
                        </table>
                        <button class="btn btn-primary" style="float: right;">Xem giỏ hàng</button>
                    </div>
                    <!--Popovers User Section For Desktop-->
                    <div class="simple-menu shadow-sm" id="tab-users-desktop" style="transform: translateX(130px); width: 300px;">
                        <div class="vertical-menu ">
                            <a class="active">Chào bạn: Phan Văn Quốc Tuấn</a>
                            <a href="#"><i class="fas fa-address-card"></i> Tài khoản của tôi</a>
                            <a href="#"><i class="fas fa-shopping-cart"></i> Đơn mua</a>
                            <a href="#"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        </div>
                    </div>
                    <!--End Popovers-->

                </div>

            </div>
        </div>
    </nav>
    <div class="container">
    @yield('breadcrumb')
    @yield('body')
    </div>
</body>

</html>
