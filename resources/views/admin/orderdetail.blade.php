@extends('admin.layouts.layout')
@section('title', 'Danh mục sản phẩm')
@section('heading', 'Danh mục sản phẩm')
@section('body')
<div class="container-fluid">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                    <h2>Đơn hàng</h2>
                </div>
                <div class="col-sm-6">
                    @if($detail[0]->Status == 1)
                        <a href="{{route('admin.order.approve', ['OrderID'=> $detail[0]->OrderID, 'Status' => 0])}}" class="btn btn-danger"><span>Bỏ duyệt hoá đơn</span></a>
                    @else
                        <a href="{{route('admin.order.approve', ['OrderID'=> $detail[0]->OrderID, 'Status' => 1])}}" class="btn btn-success"><span>Duyệt hoá đơn</span></a>
                    @endif
                    @if($detail[0]->PaymentStatus == 1)
                        <a href="{{route('admin.order.paid', ['OrderID'=> $detail[0]->OrderID, 'PaymentStatus' => 0])}}" class="btn btn-danger"><span>Bỏ đã thanh toán</span></a>
                    @else
                        <a href="{{route('admin.order.paid', ['OrderID'=> $detail[0]->OrderID, 'PaymentStatus' => 1])}}" class="btn btn-success"><span>Đã thanh toán</span></a>
                    @endif
                </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-12">
                    <h5>Khách hàng: {{$detail[0]->Name}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">Số điện thoại: {{$detail[0]->Phone}}</div>
                <div class="col-sm-4">Địa chỉ: {{$detail[0]->Address}}</div>
                <div class="col-sm-4">Thời gian đặt hàng:{{$detail[0]->Time}}</div>
            </div>
            <div class="row">
                <div class="col-sm-4">Trạng thái:{{$detail[0]->Status}} </div>
                <div class="col-sm-4">Hình thức thanh toán: {{$detail[0]->PaymentMethod}}</div>
                <div class="col-sm-4">Thanh toán: {{$detail[0]->PaymentStatus}}</div>
            </div>
            <table id="table-wrapper" class="table table-striped table-hover">
                <thead>
                    <th>Mã SP</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </thead>
                <tbody>
                    @foreach($orderds as $orderd)
                    <tr>
                        <td>{{$orderd->ProductID}}</td>
                        <td>{{$orderd->Name}}</td>
                        <td>{{$orderd->OriginalPrice}}</td>
                        <td>{{$orderd->Quality}}</td>
                        <td>{{$orderd->Price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                {{-- <div class="hint-text">Showing <b>{{$orders->to}}</b> out of <b>{{$orders->total}}</b> entries</div> --}}
            <ul class="pagination">
                <div class="d-flex justify-content-center">
                    {{-- {{$orders->links()}} --}}
                </div>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- Edit Modal HTML -->
{{-- <div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="post" action="{{route('admin.userman.updateActive')}}">
@csrf
<div class="modal-header">
    <h4 class="modal-title">Sửa danh mục</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    <input type="hidden" name="UserID" id="UserID" class="form-control" required>
    <div class="form-group">
        <label>Trạng thái</label>
        <select class="form-control" name="Active" id="Active" required>
            <option value="1">Kích hoạt</option>
            <option value="0">Vô hiệu hoá</option>
        </select>
    </div>
</div>
<div class="modal-footer">
    <input type="button" id="save" class="btn btn-default" data-dismiss="modal" value="Cancel">
    <input type="submit" id="discard" class="btn btn-info" value="Save">
</div>
</form>
</div>
</div>
</div>
<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var modal = $(this)
        modal.find('#UserID').val(button.data('userid'));
        modal.find('#Name').val(button.data('name'));
        modal.find('#Active').val(button.data('slug'));
    })

</script> --}}
<!-- Delete Modal HTML -->
{{-- <div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.userman.delete')}}" method="post">
@csrf
<div class="modal-header">
    <h4 class="modal-title">Delete Employee</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    <p>Bạn có chắc chắn muốn xoá không?</p>
    <p class="text-warning"><small>Thay đổi này không thể hoàn tác được. Hãy cẩn thận</small></p>
</div>
<input type="text" name="UserID" id="UserID" class="d-none" />
<div class="modal-footer">
    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    <input type="submit" class="btn btn-danger" value="Delete">
</div>
</form>
</div>
</div>
</div>
<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var modal = $(this)
        modal.find('#UserID').val(button.data('userid'));
    })

</script> --}}
@endsection
