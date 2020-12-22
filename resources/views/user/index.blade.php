@extends('user.layouts.master')
@section('body')
{{-- Nổi bật --}}
<div class="row">
    <div class="col-12">
        <div class="home-block mb-3">
            <div class="block-head">
                <div class="head-title">
                    SẢN PHẨM NỔI BẬT <span class="title-badge">SALE</span>
                </div>
            </div>
            <div style="padding: 1rem;padding-bottom: 0px">
                <div class="row d-block sale-block">
                    @for ($i = 0; $i < 10; $i++) <div class="col-md-3 col-4 sale-item-wrap">
                        <div class="sale-item mb-3">
                            <div class="sale-item-img">
                                <img src="https://www.petlove.com.br/images/products/213111/product/Ra%C3%A7%C3%A3o_Golden_Gatos_Adultos_Castrados_Salm%C3%A3o_31022435_1kg.jpg?1567010118">
                                <span class="sale-percent title-badge">10%</span>
                            </div>
                            <div class="sale-item-name">
                                <a href="#">Thức ăn</a>
                            </div>
                            <div class="sale-item-price">
                                <div class="price">100.000 VNĐ</div>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
</div>
{{-- END HOT --}}
{{-- SP GIẢM GIÁ VÀ SP MỚI --}}
<div class="row">
    <div class="col-md-8">
        {{-- GIẢM GIÁ --}}
        <div class="home-block mb-3">
            <div class="block-head" height="100%">
                <div class="head-title">
                    SẢN PHẨM GIẢM GIÁ <span class="title-badge">SALE</span>
                </div>
            </div>
            <div id="sale-off" style="padding: 1rem;padding-bottom: 0px">
                <div class="row d-block sale-block">
                    @for ($i = 0; $i < 10; $i++) <div class="col-md-3 col-4 sale-item-wrap">
                        <div class="sale-item mb-3">
                            <div class="sale-item-img">
                                <img src="https://www.petlove.com.br/images/products/213111/product/Ra%C3%A7%C3%A3o_Golden_Gatos_Adultos_Castrados_Salm%C3%A3o_31022435_1kg.jpg?1567010118">
                                <span class="sale-percent title-badge">10%</span>
                            </div>
                            <div class="sale-item-name">
                                <a href="#">Thức ăn</a>
                            </div>
                            <div class="sale-item-price">
                                <div class="old-price">100.000 VNĐ</div>
                                <div class="price">100.000 VNĐ</div>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
{{-- END GIẢM GIÁ --}}
{{-- SP MỚI --}}
<div class="col-md-4 pl-0" id="new">
    <div class="home-block pb-0">
        <div class="block-head">
            <div class="head-title">
                SẢN PHẨM MỚI <span class="title-badge">HOT</span>
            </div>
        </div>
        <div class="hot-list">
            <ul class="vertical-menu">
                @for ($i = 0; $i < 10; $i++) <li class="mb-3">
                    <a href="#">
                        <div class="list-content">
                            <div class="content-img">
                                <img src="https://www.petlove.com.br/images/products/213111/product/Ra%C3%A7%C3%A3o_Golden_Gatos_Adultos_Castrados_Salm%C3%A3o_31022435_1kg.jpg?1567010118">
                            </div>
                            <div class="content-info">
                                <div class="product-name">Thức ăn cho chó</div>
                                <div class="product-price">200.000 VNĐ</div>
                            </div>
                        </div>
                    </a>
                    </li>
                    @endfor
            </ul>
        </div>
    </div>
</div>
</div>
<script>
    var offsetHeight = document.getElementById('sale-off').offsetHeight;
    $(".vertical-menu").height(offsetHeight);
    console.log(offsetHeight);
</script>
{{-- END SP GIẢM GIÁ VÀ SP MỚI  --}}
{{-- BRAND --}}
<div class="row">
    <div class="col-12">
        <div class="home-block">
            <div class="block-head">
                <div class="head-title">
                    THƯƠNG HIỆU HÀNG ĐẦU <span class="title-badge">HOT</span>
                </div>
            </div>
            <div class="block-body">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                        </div>
                        <div class="carousel-item">
                            <img src="chicago.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="ny.jpg" alt="New York">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- END BRAND --}}
{{-- BLOG --}}
<div class="row mt-3">
    <div class="col-md-12">
        <div class="home-block">
            <div class="block-head">
                <div class="head-title">
                    BLOG <span class="title-badge">HOT</span>
                </div>
            </div>
            <div class="block-body">
                <div class="row mt-3">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="col-md-4 mb-3">
                        <div class="blog-block">
                            <div class="blog-image">
                                <img src="{{ url('assets/images/blog/Anhnen2.jpg')}}" />
                            </div>
                            <div class="blog-content ml-3">
                                <div class="blog-title">
                                    <a href="#">Mẹo chụp ảnh cho thú cưng</a>
                                </div>
                                <div class="blog-author">
                                    Thanh Do
                                </div>
                                <div class="blog-view">
                                    <i class="fas fa-eye"></i> <span class="">123</span>
                                </div>
                            </div>
                        </div>
                    </div>               
                    @endfor
                </div>
                <div class="row blog-seemore">
                    <a href="#" class="seemore-link">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END BRAND --}}
{{-- Khuyến mãi --}}
<div class="row mt-3">
    <div class="col-md-12">
        <div class="home-block">
            <div class="block-head">
                <div class="head-title">
                    Tin tức- khuyến mãi <span class="title-badge">HOT</span>
                </div>
            </div>
            <div class="block-body">
                <div class="row mt-3">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="col-md-4 mb-3">
                        <div class="blog-block">
                            <div class="blog-image">
                                <img src="{{ url('assets/images/blog/Anhnen2.jpg')}}" />
                            </div>
                            <div class="blog-content ml-3">
                                <div class="blog-title">
                                    <a href="#">Mẹo chụp ảnh cho thú cưng</a>
                                </div>
                                <div class="blog-author">
                                    Thanh Do
                                </div>
                                <div class="blog-view">
                                    <i class="fas fa-eye"></i> <span class="">123</span>
                                </div>
                            </div>
                        </div>
                    </div>               
                    @endfor
                </div>
                <div class="row blog-seemore">
                    <a href="#" class="seemore-link">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END BRAND --}}
@endsection