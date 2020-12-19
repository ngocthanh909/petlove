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
                        <th>ID</th>
                        <th>Danh mục cha</th>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Ngày thêm</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td><input type="checkbox" value="{{$category->CategoryID}}"></td>
                        <td>{{$category->CategoryID}}</td>

                        <td>
                            @php
                            foreach($categories as $value){
                                if($category->ParentID == $value->CategoryID){
                                    echo $value->Name;
                                }
                            }
                            @endphp
                        </td>
                        <td>{{$category->Name}}</td>
                        <td>{{$category->Slug}}</td>
                        <td>{{$category->Time}}</td>
                        <td>
                            <a href="#editModal" class="edit" data-toggle="modal" data-categoryid="{{$category->CategoryID}}" data-parentid="{{$category->ParentID}}" data-name="{{$category->Name}}" data-slug="{{$category->Slug}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteModal" class="delete" data-toggle="modal" data-categoryid="{{$category->CategoryID}}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                {{-- <div class="hint-text">Showing <b>{{$categories->to}}</b> out of <b>{{$categories->total}}</b> entries</div> --}}
            <ul class="pagination">
                <div class="d-flex justify-content-center">
                    {{$categories->links()}}
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
            <form id="addForm" method="get" action="{{route('admin.cmscategory.create')}}">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm danh mục</h4>
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
<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="get" action="{{route('admin.cmscategory.update')}}">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm danh mục</h4>
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

</script>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.cmscategory.delete')}}" method="get">
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

</script>
@endsection
