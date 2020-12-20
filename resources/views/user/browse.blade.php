@extends('user.layout.layout1' , ['categories' => $categories])

@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="row hid-on--mobile">
        <div class="col-lg-3 sidebar">
            <div class="box-filter">
                <h5>Shop cho chó</h5>
                <ul>
                    <li>Thức ăn cho chó</li>
                    <li>Quần áo cho chó</li>
                    <li>Vòng cổ, dây dắt, rọ mõm chó mèo</li>
                    <li>Vật dụng ăn uống cho chó</li>
                    <li>Y tế & thuốc cho chó</li>
                    <li>Mỹ phẩm & làm đẹp</li>
                    <li>Dụng cụ vệ sinh</li>
                    <li>Chuồng chó, giường, nhà, túi</li>
                    <li>Đồ chơi, phụ kiện huấn luyện</li>
                </ul>
            </div>

            <div class="price-filter">
                <h5>Khoảng giá</h5>
                <ul>
                    <li><input type="checkbox"> Dưới 50 ngàn</li>
                    <li><input type="checkbox"> 50 ngàn - 70 ngàn</li>
                    <li><input type="checkbox"> 70 ngàn - 100 ngàn</li>
                    <li><input type="checkbox"> 100 ngàn - 150 ngàn</li>
                    <li><input type="checkbox"> 100 ngàn - 150 ngàn</li>
                    <li><input type="checkbox"> 200 ngàn - 500 ngàn</li>
                    <li><input type="checkbox"> 500 ngàn - 700 ngàn</li>
                    <li><input type="checkbox"> 1 triệu - 1.5 triệu</li>
                    <li><input type="checkbox"> Trên 2 triệu</li>
                </ul>
            </div>
            <div class="box-blog">
                <h5>Blog</h5>
                <div class="blog-box-item">
                    <img src="https://www.petcity.vn/media/news/120_826_care_your_pet.png" style="height: 61px; width: 92px;">
                    <p>(HÀM LONG - 13/1/2019)CARE YOUR PET - Ngày Hội Tiêm Phòng Giá Gốc Và Khám Chữa Bệnh ...</p>
                </div>

            </div>

        </div>
        <div class="col-lg-9" style="background: white;">
            <h5>Sản phẩm được tìm kiếm nhiều nhất: </h5>
            
            <div class="row">
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
    <div class="row hid-on--desktop">

        <div class="box-filter-mobile" style="background: white;">
            <h5>Shop cho chó</h5>
            <ul style="list-style-type: none; padding: 0">
                <li>Thức ăn cho chó <i style="float: right;" class="fas fa-angle-right"></i></li>
                <li>Quần áo cho chó <i style="float: right;" class="fas fa-angle-right"></i></li>
                <li>Vòng cổ, dây dắt, rọ mõm chó mèo <i style="float: right;" class="fas fa-angle-right"></i></li>
            </ul>
        </div>



        <button class="btn btn-custom-2" style="width: 100%; margin-bottom: 10px;">Xem thêm</button>



        <div class="box-filter-mobile">
            <label for="subdir">Mức giá:</label>
            <select name="subdir" id="cars">
                <option>Dưới 50 ngàn</option>
                <option>50 ngàn - 70 ngàn</option>
                <option>70 ngàn - 100 ngàn</option>
                <option>100 ngàn - 150 ngàn</option>
                <option>100 ngàn - 150 ngàn</option>
                <option>200 ngàn - 500 ngàn</option>
                <option>500 ngàn - 700 ngàn</option>
                <option>1 triệu - 1.5 triệu</option>
                <option>Trên 2 triệu</option>
            </select>
        </div>
        <br>

        <div class="row product-browse" style="background: white;">
            <div class="col-4">
                <img src="https://www.petlove.com.br/images/products/223842/small/Ra%C3%A7%C3%A3o_Seca_Nutrilus_Pro_Frango___Carne_para_C%C3%A3es_Adultos_2492301_15KG.jpg?1589384764" style="width: 100%;">
            </div>
            <div class="col-8">
                <div class="content-info">
                    <div class="product-name">Ração Seca Nutrilus Pro Frango & Carne para Cães Adultos - 15 Kg</div>
                    <span class="product-discount">Giảm 10%</span><span class="product-og-price">600.000đ</span>
                    <h5 class="product-price">500.000đ</h5>
                    <div class="product-rating" style="font-size: 10px; float: right;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                        <span>(56)</span><span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row product-browse">
            <div class="col-4">
                <img src="https://www.petlove.com.br/images/products/223842/small/Ra%C3%A7%C3%A3o_Seca_Nutrilus_Pro_Frango___Carne_para_C%C3%A3es_Adultos_2492301_15KG.jpg?1589384764" style="width: 100%;">
            </div>
            <div class="col-8">
                <div class="content-info">
                    <div class="product-name">Ração Guabi Natural Grain Free Frango e Lentilha para Cães Adultos Raças Médias - 2,5 Kg</div>
                    <div class="product-price">200.000 VNĐ</div>
                    <div class="product-rating" style="font-size: 10px; float: right;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                        <span>(56)</span><span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row product-browse">
            <div class="col-4">
                <img src="https://www.petlove.com.br/images/products/223842/small/Ra%C3%A7%C3%A3o_Seca_Nutrilus_Pro_Frango___Carne_para_C%C3%A3es_Adultos_2492301_15KG.jpg?1589384764" style="width: 100%;">
            </div>
            <div class="col-8">
                <div class="content-info">
                    <div class="product-name">Ração Guabi Natural Grain Free Frango e Lentilha para Cães Adultos Raças Médias - 2,5 Kg</div>
                    <div class="product-price">200.000 VNĐ</div>
                    <div class="product-rating" style="font-size: 10px; float: right;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                        <span>(56)</span><span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row product-browse">
            <div class="col-4">
                <img src="https://www.petlove.com.br/images/products/223842/small/Ra%C3%A7%C3%A3o_Seca_Nutrilus_Pro_Frango___Carne_para_C%C3%A3es_Adultos_2492301_15KG.jpg?1589384764" style="width: 100%;">
            </div>
            <div class="col-8">
                <div class="content-info">
                    <div class="product-name">Ração Guabi Natural Grain Free Frango e Lentilha para Cães Adultos Raças Médias - 2,5 Kg</div>
                    <div class="product-price">200.000 VNĐ</div>
                    <div class="product-rating" style="font-size: 10px; float: right;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                        <span>(56)</span><span></span>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-custom-3" style="width: 100%; margin-top: 10px;">Xem thêm</button>
        
    </div>
</div>
@endsection