@extends('user.layout.layout1' , ['categories' => $categories])

@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner blog-carousel">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="https://www.petcity.vn/media/banner/09_Apr4e741c61970cf766d82a65017d288437.png" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="https://www.petcity.vn/media/banner/25_Augab53eb6da2b1324d289324c583d4866f.png" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="https://www.petcity.vn/media/banner/25_Augab53eb6da2b1324d289324c583d4866f.png" alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>




                </div>
        
                <div class="col-lg-6">
                    
                    <!-- <div class="card" style="border:none;">
                        <div class="row">
                            <div class="col-auto">
                                <img src="https://www.petcity.vn/media/news/915_dat_cho_di_dao_01.jpg" style="width: 120px;" class="img-fluid" alt="">
                            </div>
                            <div class="col">
                                <h4 class="blog-title">Những lưu ý khi cho chó đi chơi</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="border:none;">
                        <div class="row">
                            <div class="col-auto">
                                <img src="https://www.petcity.vn/media/news/915_dat_cho_di_dao_01.jpg" style="width: 120px;" class="img-fluid" alt="">
                            </div>
                            <div class="col">
                                <h4 class="blog-title">Những lưu ý khi cho chó đi chơi</h4>
                            </div>
                        </div>
                    </div> -->


                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="box-news">
                        <div class="block-head">
                            <div class="head-title">
                                Dịch vụ Pet Grooming <span class="title-badge">HOT</span>
                            </div>
                        </div>
                        <div class="box-top">
                            <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="img">
                                <img src="https://www.petcity.vn/media/news/1341_mua_h___t_t___ng_voucher.png" alt="Mua hạt cho Pet - Nhận voucher 50k"></a>
                                <div class="right-side"><a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="name">Mua hạt cho Pet - Nhận voucher 50k</a>
                                <span class="summary">Với hóa đơn thức ăn hạt có tổng trọng lượng từ 5kg tặng kèm voucher 50k áp dụng mua đồ dùng, đồ chơi + 𝑯𝒐𝒂̀𝒏 𝒕𝒊𝒆̂̀𝒏 thêm 30% tối đa 15k khi th..</span>
                                <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="more"><span>»</span>Xem tiếp</a>
                                </div>
                        </div>
                        <br>
                        <ul>
                            <li><a href="/tin-khuyen-mai/thu-sau-ngay-vang-ron-rang-dat-ship-1322.html">THỨ SÁU NGÀY VÀNG- RỘN RÀNG ĐẶT SHIP </a></li>
                            <li><a href="/mua-sam-de-dang-nhe-nhang-ve-gia.html">Mua sắm dễ dàng, Nhẹ nhàng về giá</a></li>
                            <li><a href="/mua-hang-kim-ma-nhan-ngan-coupon.html">Mua hàng Kim Mã, nhận ngàn coupon</a></li>
                            <li><a href="/265-16-quoc-te-thieu-nhi-gia-sale-het-y.html">(26/5 - 1/6) Quốc tế Thiếu nhi - Giá Sale hết ý</a></li>
                            <li><a href="/petcity-mo-the-ngay-nhan-qua-lien-tay.html">PETCITY: MỞ THẺ NGAY - NHẬN QUÀ LIỀN TAY </a></li>
                        </ul>
                    </div>
                    <div class="box-news">
                        <div class="block-head">
                            <div class="head-title">
                                Dịch vụ Pet Grooming <span class="title-badge">HOT</span>
                            </div>
                        </div>
                        <div class="box-top">
                            <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="img">
                                <img src="https://www.petcity.vn/media/news/1341_mua_h___t_t___ng_voucher.png" alt="Mua hạt cho Pet - Nhận voucher 50k"></a>
                                <div class="right-side"><a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="name">Mua hạt cho Pet - Nhận voucher 50k</a>
                                <span class="summary">Với hóa đơn thức ăn hạt có tổng trọng lượng từ 5kg tặng kèm voucher 50k áp dụng mua đồ dùng, đồ chơi + 𝑯𝒐𝒂̀𝒏 𝒕𝒊𝒆̂̀𝒏 thêm 30% tối đa 15k khi th..</span>
                                <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="more"><span>»</span>Xem tiếp</a>
                                </div>
                        </div>
                        
                    </div>
                    <div class="box-news">
                        <div class="block-head">
                            <div class="head-title">
                                Dịch vụ Pet Grooming <span class="title-badge">HOT</span>
                            </div>
                        </div>
                        <div class="box-top">
                            <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="img">
                                <img src="https://www.petcity.vn/media/news/1341_mua_h___t_t___ng_voucher.png" alt="Mua hạt cho Pet - Nhận voucher 50k"></a>
                                <div class="right-side"><a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="name">Mua hạt cho Pet - Nhận voucher 50k</a>
                                <span class="summary">Với hóa đơn thức ăn hạt có tổng trọng lượng từ 5kg tặng kèm voucher 50k áp dụng mua đồ dùng, đồ chơi + 𝑯𝒐𝒂̀𝒏 𝒕𝒊𝒆̂̀𝒏 thêm 30% tối đa 15k khi th..</span>
                                <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="more"><span>»</span>Xem tiếp</a>
                                </div>
                        </div>
                    </div>
                    <div class="box-news">
                        <div class="block-head">
                            <div class="head-title">
                                Dịch vụ Pet Grooming <span class="title-badge">HOT</span>
                            </div>
                        </div>
                        <div class="box-top">
                            <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="img">
                                <img src="https://www.petcity.vn/media/news/1341_mua_h___t_t___ng_voucher.png" alt="Mua hạt cho Pet - Nhận voucher 50k"></a>
                                <div class="right-side"><a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="name">Mua hạt cho Pet - Nhận voucher 50k</a>
                                <span class="summary">Với hóa đơn thức ăn hạt có tổng trọng lượng từ 5kg tặng kèm voucher 50k áp dụng mua đồ dùng, đồ chơi + 𝑯𝒐𝒂̀𝒏 𝒕𝒊𝒆̂̀𝒏 thêm 30% tối đa 15k khi th..</span>
                                <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="more"><span>»</span>Xem tiếp</a>
                                </div>
                        </div>
                    </div>
                    

                </div>
                <div class="col-lg-6">
                    <div class="box-news">
                        <div class="block-head">
                            <div class="head-title">
                                Dịch vụ Pet Grooming <span class="title-badge">HOT</span>
                            </div>
                        </div>
                        <div class="box-top">
                            <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="img">
                                <img src="https://www.petcity.vn/media/news/1341_mua_h___t_t___ng_voucher.png" alt="Mua hạt cho Pet - Nhận voucher 50k"></a>
                                <div class="right-side"><a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="name">Mua hạt cho Pet - Nhận voucher 50k</a>
                                <span class="summary">Với hóa đơn thức ăn hạt có tổng trọng lượng từ 5kg tặng kèm voucher 50k áp dụng mua đồ dùng, đồ chơi + 𝑯𝒐𝒂̀𝒏 𝒕𝒊𝒆̂̀𝒏 thêm 30% tối đa 15k khi th..</span>
                                <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="more"><span>»</span>Xem tiếp</a>
                                </div>
                        </div>
                        <br>
                        <ul>
                            <li><a href="/tin-khuyen-mai/thu-sau-ngay-vang-ron-rang-dat-ship-1322.html">THỨ SÁU NGÀY VÀNG- RỘN RÀNG ĐẶT SHIP </a></li>
                            <li><a href="/mua-sam-de-dang-nhe-nhang-ve-gia.html">Mua sắm dễ dàng, Nhẹ nhàng về giá</a></li>
                           
                        </ul>
                    </div>
                    <div class="box-news">
                        <div class="block-head">
                            <div class="head-title">
                                Dịch vụ Pet Grooming <span class="title-badge">HOT</span>
                            </div>
                        </div>
                        <div class="box-top">
                            <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="img">
                                <img src="https://www.petcity.vn/media/news/831_1200__1_.png" alt="Mua hạt cho Pet - Nhận voucher 50k"></a>
                                <div class="right-side"><a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="name">Mua hạt cho Pet - Nhận voucher 50k</a>
                                <span class="summary">Với hóa đơn thức ăn hạt có tổng trọng lượng từ 5kg tặng kèm voucher 50k áp dụng mua đồ dùng, đồ chơi + 𝑯𝒐𝒂̀𝒏 𝒕𝒊𝒆̂̀𝒏 thêm 30% tối đa 15k khi th..</span>
                                <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="more"><span>»</span>Xem tiếp</a>
                                </div>
                        </div>
                    </div>

                    <div class="box-news">
                        <div class="block-head">
                            <div class="head-title">
                                Dịch vụ Pet Grooming <span class="title-badge">HOT</span>
                            </div>
                        </div>
                        <div class="box-top">
                            <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="img">
                                <img src="https://www.petcity.vn/media/news/1341_mua_h___t_t___ng_voucher.png" alt="Mua hạt cho Pet - Nhận voucher 50k"></a>
                                <div class="right-side"><a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="name">Mua hạt cho Pet - Nhận voucher 50k</a>
                                <span class="summary">Với hóa đơn thức ăn hạt có tổng trọng lượng từ 5kg tặng kèm voucher 50k áp dụng mua đồ dùng, đồ chơi + 𝑯𝒐𝒂̀𝒏 𝒕𝒊𝒆̂̀𝒏 thêm 30% tối đa 15k khi th..</span>
                                <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="more"><span>»</span>Xem tiếp</a>
                                </div>
                        </div>
                    </div>
                    <div class="box-news">
                        <div class="block-head">
                            <div class="head-title">
                                Dịch vụ Pet Grooming <span class="title-badge">HOT</span>
                            </div>
                        </div>
                        <div class="box-top">
                            <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="img">
                                <img src="https://www.petcity.vn/media/news/1341_mua_h___t_t___ng_voucher.png" alt="Mua hạt cho Pet - Nhận voucher 50k"></a>
                                <div class="right-side"><a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="name">Mua hạt cho Pet - Nhận voucher 50k</a>
                                <span class="summary">Với hóa đơn thức ăn hạt có tổng trọng lượng từ 5kg tặng kèm voucher 50k áp dụng mua đồ dùng, đồ chơi + 𝑯𝒐𝒂̀𝒏 𝒕𝒊𝒆̂̀𝒏 thêm 30% tối đa 15k khi th..</span>
                                <a href="/tin-khuyen-mai/mua-hat-cho-pet-nhan-voucher-50k-1341.html" class="more"><span>»</span>Xem tiếp</a>
                                </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="col-lg-3">
            <div class="block-head">
                <div class="head-title">
                    Sản phẩm HOT <span class="title-badge">HOT</span>
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
@endsection