<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="{{asset('assets\admin\css\styles.css')}}" rel="stylesheet" />
    <link href="{{asset('assets\admin\css\custom.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets\admin\js\scripts.js')}}"></script>
    <script src="{{asset('assets\admin\js\slug.js')}}"></script>
    <script src="{{asset('assets\admin\js\table-renderer.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    @include('ckfinder::setup')
</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html"><img src="{{ asset('frontend/images/header-logo.svg') }} " style="height: 2rem; width: auto"></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>{{session('userData')['Name']}}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Cài đặt</a>
                    <a class="dropdown-item" href="#">Hoạt động</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin.logout')}}">Đăng xuất</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- Bảng điều khiển -->
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Bảng điều khiển
                        </a>
                        <!-- Quản lý sản phẩm -->
                        <div class="sb-sidenav-menu-heading">QUẢN LÝ SẢN PHẨM</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productmanage" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Quản lý sản phẩm
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="productmanage" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('admin.category')}}">Quản lý danh mục</a>
                                <a class="nav-link" href="{{route('admin.brand')}}">Quản lý nhãn hàng</a>
                                <a class="nav-link" href="{{route('admin.product')}}">Quản lý sản phẩm</a>
                            </nav>
                        </div>
                        <!-- Quản lý nội dung -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cmsmanage" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Quản lý nội dung
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="cmsmanage" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('admin.cmscategory')}}">Quản lý danh mục</a>
                                <a class="nav-link" href="{{route('admin.cms')}}">Quản lý bài viết</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Quản lý tin tức
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>



                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Quản lý tài khoản</div>
                        <a class="nav-link" href="{{route('admin.userman')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Tài khoản thành viên
                        </a>
                        <a class="nav-link" href="{{route('admin.adminman')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tài khoản quản trị
                        </a>
                        <div class="sb-sidenav-menu-heading">Thống kê</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Đăng nhập dưới tên</div>
                    {{session('userData')['Name']}} - {{session('userData')['RoleName']}}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">@yield('heading')</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>

                    <div class="mb-4">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    @php
                                    $response = (['code' => session()->pull('code'), 'msg' => session()->pull('msg')]);
                                    @endphp
                                    @isset($response['code'])
                                    @if($response['code'] == 1)
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        @foreach((array)$response['msg'] as $key => $value)
                                        {{$value}}
                                        @endforeach
                                    </div>
                                    @elseif($response['code'] == 0)
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        @foreach((array)$response['msg'] as $key => $value)
                                        {{$value}}
                                        @endforeach
                                    </div>
                                    @endif
                                    @endisset
                                </div>
                            </div>
                            @yield('body')
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Petlove {{date("Y")}}</div>
                        <div>
                            <a href="#">Chính sách quyền riêng tư</a>
                            &middot;
                            <a href="#">Điều khoản sử dụng</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
