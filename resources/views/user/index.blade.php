@extends('user.layout.layout1' , ['categories' => $categories])

@section('content')
<div class="container">
    <!--Bannners-->

    <div class="row hid-on--mobile" style="margin-top: 50px;">
        <div class="col-md-9 d-flex justify-content-center">
            <img class="img-fluid" src="https://www.petcity.vn/media/banner/25_Augab53eb6da2b1324d289324c583d4866f.png">
        </div>
        <div class="col-md-3 d-flex justify-content-center">
            <div class="">
                <img class="img-fluid" src="https://www.petcity.vn/media/banner/09_Novf4e658d141ce1a9b9153a5c0a908f089.png">
                <img class="img-fluid" src="https://www.petcity.vn/media/banner/09_Novf4e658d141ce1a9b9153a5c0a908f089.png">
            </div>
        </div> 
    </div>

    <div class="row hid-on--desktop" style="margin-top: 50px;">
        <div class="col-md-12 d-flex justify-content-center">
            <img class="img-fluid" src="https://www.petcity.vn/media/banner/25_Augab53eb6da2b1324d289324c583d4866f.png">
        </div>
    </div>

    <!--End Banners-->


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
                        <div class="col-md-3 col-4 sale-item-wrap">
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
                        <div class="col-md-3 col-4 sale-item-wrap">
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
                        <div class="col-md-3 col-4 sale-item-wrap">
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
                        <div class="col-md-3 col-4 sale-item-wrap">
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
                    </div>   
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="home-block mb-3">
                <div class="block-head" height="100%">
                    <div class="head-title">
                        SẢN PHẨM GIẢM GIÁ <span class="title-badge">SALE</span>
                    </div>
                </div>
                <div id="sale-off" style="padding: 1rem;padding-bottom: 0px">
                    <div class="row d-block sale-block">
                        <div class="col-md-3 col-4 sale-item-wrap">
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
                        <div class="col-md-3 col-4 sale-item-wrap">
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
                        <div class="col-md-3 col-4 sale-item-wrap">
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
                        <div class="col-md-3 col-4 sale-item-wrap">
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
                        <div class="col-md-3 col-4 sale-item-wrap">
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
                    </div>
                
                </div>
             
            </div>
        
        </div>
        <div class="col-md-4 pl-0" id="new">
            <div class="home-block pb-0">
                <div class="block-head">
                    <div class="head-title">
                        SẢN PHẨM MỚI <span class="title-badge">HOT</span>
                    </div>
                </div>
                <div class="hot-list">
                    <ul class="vertical-menu">
                        <li class="mb-3">
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
                    
                    </ul>
                    <ul class="vertical-menu">
                        <li class="mb-3">
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
                    
                    </ul>
                    <ul class="vertical-menu">
                        <li class="mb-3">
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
                    
                    </ul>
                    <ul class="vertical-menu">
                        <li class="mb-3">
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
                    
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="home-block">
                <div class="block-head">
                    <div class="head-title">
                        BLOG <span class="title-badge">HOT</span>
                    </div>
                </div>
                <div class="block-body">
                    <div class="row mt-3">
                        <div class="col-md-6 mb-3">
                            <div class="blog-block">
                                <div class="blog-image">
                                    <img src="https://www.petlove.com.br/images/products/213111/product/Ra%C3%A7%C3%A3o_Golden_Gatos_Adultos_Castrados_Salm%C3%A3o_31022435_1kg.jpg?1567010118" />
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
                        <div class="col-md-6 mb-3">
                            <div class="blog-block">
                                <div class="blog-image">
                                    <img src="https://www.petlove.com.br/images/products/213111/product/Ra%C3%A7%C3%A3o_Golden_Gatos_Adultos_Castrados_Salm%C3%A3o_31022435_1kg.jpg?1567010118" />
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
                        <div class="col-md-6 mb-3">
                            <div class="blog-block">
                                <div class="blog-image">
                                    <img src="https://www.petlove.com.br/images/products/213111/product/Ra%C3%A7%C3%A3o_Golden_Gatos_Adultos_Castrados_Salm%C3%A3o_31022435_1kg.jpg?1567010118" />
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
                        <div class="col-md-6 mb-3">
                            <div class="blog-block">
                                <div class="blog-image">
                                    <img src="https://www.petlove.com.br/images/products/213111/product/Ra%C3%A7%C3%A3o_Golden_Gatos_Adultos_Castrados_Salm%C3%A3o_31022435_1kg.jpg?1567010118" />
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
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 pl-0">
            <div class="home-block">
                <div class="block-head">
                    <div class="head-title">
                        TIN TỨC <span class="title-badge">HOT</span>
                    </div>
                    <div class="block-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection