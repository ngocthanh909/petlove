<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{asset('assets/admin/css/invoice.css')}}" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> In</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Xuất dưới dạng PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="{{ asset('assets/admin/svg/logo-petlove.svg') }} " style="height: 4rem; width: auto">
                        </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                                Công ty cổ phần kinh doanh Petlove
                            </a>
                        </h2>
                        <div>Ngũ Hành Sơn, Đà Nẵng</div>
                        <div>0347539143</div>
                        <div>thanhstp99@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Khách hàng:</div>
                        <h2 class="to">{{$detail[0]->Name}}</h2>
                        <div class="address">{{$detail[0]->Address}}</div>
                        <div class="email"><a href="mailto:john@example.com">{{$detail[0]->Phone}}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 3-2-1</h1>
                        <div class="date">Date of Invoice: 01/10/2018</div>
                        <div class="date">Due Date: 30/10/2018</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th class="text-left">Tên sản phẩm</th>
                            <th class="text-right">Giá</th>
                            <th class="text-right">Số lượng</th>
                            <th class="text-right">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 0;
                        @endphp
                        @foreach($orderds as $orderd)
                        <tr>
                            <td class="no">{{$i++}}</td>
                            <td class="text-left">
                                <h3>
                                    <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                        {{$orderd->Name}}
                                    </a>
                                </h3>
                            </td>
                            <td class="unit">{{$orderd->OriginalPrice}} VNĐ</td>
                            <td class="qty">{{$orderd->Quality}}</td>
                            <td class="total">{{$orderd->Price}} VNĐ</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Tạm tính</td>
                            <td>{{$detail[0]->Price}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Thuế GTGT 0%</td>
                            <td>0 VNĐ</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TỔNG TIỀN</td>
                            <td>{{$detail[0]->Price}}</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Cảm ơn quý khách</div>
                <div class="notices">
                    <div>Chú ý:</div>
                    <div class="notice">Không đổi trả đối với mặc hàng ăn uống</div>
                </div>
            </main>
            <footer>
                Copyright (2020) by Petlove
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
<script>
    $('#printInvoice').click(function() {
        Popup($('.invoice')[0].outerHTML);

        function Popup(data) {
            window.print();
            return true;
        }
    });

</script>
