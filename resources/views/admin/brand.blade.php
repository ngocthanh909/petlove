@extends('admin.layouts.layout')
@section('title', 'Quản lý danh mục nhãn hàng')
@section('heading', 'Danh mục nhãn hàng')
@section('body')
<div class="container-fluid">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Employees</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        <a href="#deleteModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div>
                </div>
            </div>
            <table id="table-wrapper" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>ID</th>
                        <th>Tên nhãn hàng</th>
                        <th>Avatar</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Thời gian thêm</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td><input type="checkbox" value="{{$brand->BrandID}}"></td>
                        <td>{{$brand->BrandID}}</td>
                        <td>{{$brand->Name}}</td>
                        <td><img src="{{asset($brand->Avatar)}}" style="width:2rem; height auto"></td>
                        <td>{{$brand->Slug}}</td>
                        <td>{{$brand->Description}}</td>
                        <td>{{$brand->Time}}</td>
                        <td>
                            <a href="#editModal" class="edit" data-toggle="modal" data-brandid="{{$brand->BrandID}}" data-name="{{$brand->Name}}" data-avatar="{{$brand->Avatar}}" data-slug="{{$brand->Slug}}" data-description="{{$brand->Description}}" data-time="{{$brand->Time}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteModal" class="delete" data-toggle="modal" data-brandid="{{$brand->BrandID}}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <ul class="pagination">
                    <div class="d-flex justify-content-center">
                        {{$brands->links()}}
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal HTML -->
<div id="addModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="post" action="{{route('admin.brand.create')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm nhãn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên nhãn hàng</label>
                        <input type="text" name="Name" id="Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="Slug" id="Slug" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" name="Avatar" id="Avatar" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả nhãn hàng</label>
                        <input type="text" name="Description" id="Description" class="form-control" required>
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
<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="post" action="{{route('admin.brand.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="BrandID" id="BrandID" class="d-none">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm nhãn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên nhãn hàng</label>
                        <input type="text" name="Name" id="Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="Slug" id="Slug" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" name="Avatar" id="Avatar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mô tả nhãn hàng</label>
                        <input type="text" name="Description" id="Description" class="form-control" required>
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
        var id = button.data('id') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('#BrandID').val(button.data('brandid'));
        modal.find('#Name').val(button.data('name'));
        modal.find('#Slug').val(button.data('slug'));
        modal.find('#Description').val(button.data('description'));
    })

</script>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.brand.delete')}}" method="get">
                <div class="modal-header">
                    <h4 class="modal-title">Xoá</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xoá không?</p>
                    <p class="text-warning"><small>Thay đổi này không thể hoàn tác được. Hãy cẩn thận</small></p>
                </div>
                <input type="hidden" name="BrandID" id="BrandID"/>
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
        modal.find('#BrandID').val(button.data('brandid'));
    })
</script>
@endsection
