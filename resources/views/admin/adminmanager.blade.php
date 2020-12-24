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
                        <th>#</th>
                        <th>Tên đăng nhập</th>
                        <th>Tên hiển thị</th>
                        <th>Vai trò</th>
                        <th>Kích hoạt</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td><input type="checkbox" value="{{$admin->AdminID}}"></td>
                        <td>{{$admin->AdminID}}</td>
                        <td>{{$admin->Username}}</td>
                        <td>{{$admin->Name}}</td>
                        <td>
                            <form name="RoleForm">
                            @csrf
                                <input type="hidden" name="AdminID" value="{{$admin->AdminID}}" />
                                <select name="Role" id="Role">
                                    @if($admin->Role == 0)
                                    <option value="0" selected>Quản trị</option>
                                    <option value="1">Nhân viên</option>
                                    @else
                                    <option value="0">Quản trị</option>
                                    <option value="1" selected>Nhân viên</option>
                                    @endif
                                </select>
                            </form>
                        </td>
                        <td>
                            <form name="ActiveForm">
                            @csrf
                                <input type="hidden" name="AdminID" value="{{$admin->AdminID}}" />
                                @if($admin->Active == 1)
                                <input type="checkbox" name="Active" value="{{$admin->Active}}" checked />
                                @else
                                <input type="checkbox" name="Active" value="{{$admin->Active}}" />
                                @endif
                            </form>
                        </td>
                        <td>
                            {{-- <a href="#editModal" class="edit" data-toggle="modal" data-categoryid="{{$admin->CategoryID}}" data-parentid="{{$admin->ParentID}}" data-name="{{$admin->Name}}" data-slug="{{$admin->Slug}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteModal" class="delete" data-toggle="modal" data-categoryid="{{$admin->CategoryID}}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    $("select[name ='Role']").change(function() {
                        var data = $("form[name ='RoleForm']").serialize();
                        $.ajax({
                            type: "post"
                            , url: "{{route('admin.adminman.updateRole')}}"
                            , cache: false
                            , data: data
                            , dataType: "json"
                            , success: function(response) {
                                if(response){
                                    alert("Thao tác thành công")
                                } else {
                                    alert("Thao tác thất bại! Vui lòng kiểm tra lại!")
                                }
                            }
                            , error: function() {
                                alert("Error");
                            }
                        });
                    })
                })

            </script>
                        <script>
                $(document).ready(function() {
                    $("select[name ='Active']").change(function() {
                        var data = $("form[name ='ActiveForm']").serialize();
                        $.ajax({
                            type: "post"
                            , url: "{{route('admin.adminman.updateActive')}}"
                            , cache: false
                            , data: data
                            , dataType: "json"
                            , success: function(response) {
                                if(response){
                                    alert("Thao tác thành công")
                                } else {
                                    alert("Thao tác thất bại! Vui lòng kiểm tra lại!")
                                }
                            }
                            , error: function() {
                                alert("Error");
                            }
                        });
                    })
                })

            </script>
            <div class="clearfix">
                {{-- <div class="hint-text">Showing <b>{{$admins->to}}</b> out of <b>{{$admins->total}}</b> entries</div> --}}
            <ul class="pagination">
                <div class="d-flex justify-content-center">
                    {{-- {{$admins->links()}} --}}
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
            <form id="addForm" method="post" action="{{route('admin.adminman.create')}}">
            @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm người dùng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="Username" id="Username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Vai trò</label>
                        <select class="form-control" name="Role" id="Role" required>
                            <option value="1">Nhân viên</option>
                            <option value="0">Quản trị</option>
                        </select>
                    </div>
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
<!-- Edit Modal HTML -->
{{-- <div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="get" action="{{route('admin.category.update')}}">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="CategoryID" id="CategoryID" class="form-control" required>
                    <div class="form-group">
                        <label>Danh mục cha</label>
                        <select class="form-control" name="ParentID" id="ParentID" required>
                            @foreach ($categories as $category)
                            <option value="{{$category->CategoryID}}">{{$category->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" name="Name" id="Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="Slug" id="Slug" class="form-control" required>
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
        modal.find('#CategoryID').val(button.data('categoryid'));
        modal.find('#ParentID').val(button.data('parentid'));
        modal.find('#Name').val(button.data('name'));
        modal.find('#Slug').val(button.data('slug'));
    })
</script> --}}
<!-- Delete Modal HTML -->
{{-- <div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.category.delete')}}" method="get">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xoá không?</p>
                    <p class="text-warning"><small>Thay đổi này không thể hoàn tác được. Hãy cẩn thận</small></p>
                </div>
                <input type="text" name="CategoryID" id="CategoryID" class="d-none" />
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
        modal.find('#CategoryID').val(button.data('categoryid'));
    })
</script> --}}
@endsection
