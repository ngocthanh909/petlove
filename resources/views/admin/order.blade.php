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
                        <h2>Quản lý <b>thành viên</b></h2>
                    </div>
                    <div class="col-sm-6">
                        {{-- <a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        <a href="#deleteModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2 ml-0">
                    <form id="sort">
                        <span>Sắp xếp theo</span>
                        <select onChange="this.form.submit()" name="sort">
                            <option value="null">--Chọn--</option>
                            <option value="asc">Cũ nhất trước</option>
                            <option value="desc">Mới nhất trước</option>
                        </select>
                    </form>
                </div>
                <div class="col-sm-3 mb-2 ml-0">
                    <form id="form-approved" method="get">
                        <span>Lọc sản phẩm</span>
                        <select onChange="this.form.submit()" name="approved">
                            <option value="null">--Chọn--</option>
                            <option value="1">Đã duyệt</option>
                            <option value="0">Chưa duyệt</option>
                        </select>
                    </form>
                </div>
            </div>
            <table id="table-wrapper" class="table table-striped table-hover">
                <thead>
                    <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    <th>Mã đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Đơn giá</th>
                    <th>Hình thức thanh toán</th>
                    <th>Địa chỉ giao hàng</th>
                    <th>SĐT</th>
                    <th>Trạng thái đơn hàng</th>
                    <th>Tình trạng toán</th>
                    <th>Hành động</th>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td><input type="checkbox" value="{{$order->OrderID}}"></td>
                        <td>{{$order->OrderID}}</td>
                        <td>{{$order->Name}}</td>
                        <td>{{$order->Price}}</td>
                        <td>
                            @if($order->PaymentMethod == 1)
                            COD
                            @else
                            N/A
                            @endif
                        </td>
                        <td>{{$order->Address}}</td>
                        <td>{{$order->Phone}}</td>
                        <td>
                            @if($order->Status)
                            Đã duyệt
                            @else
                            Chưa được duyệt
                            @endif
                        </td>
                        <td>
                            @if($order->PaymentStatus)
                            Đã thanh toán
                            @else
                            Chưa thanh toán
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.order.detail', $order->OrderID)}}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Xem chi tiết">&#xE254;</i></a>
                            {{-- <a href="#deleteModal" class="delete" data-toggle="modal" data-userid="{{$order->UserID}}" data-name="{{$order->Name}}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> --}}
                        </td>
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
