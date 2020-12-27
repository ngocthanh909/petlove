@extends('admin.layouts.layout')
@section('title', 'Quản lý nội dung')
@section('heading', 'Nội dung tin tức')
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
                        <th>Avatar</th>
                        <th>Danh mục</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả ngắn</th>
                        <th>Nội dung</th>
                        <th>Slug</th>
                        <th>Lượt xem</th>
                        <th>Ngày chỉnh sửa</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cmss as $cms)
                    <tr>
                        <td><input type="checkbox" value="{{$cms->CmsID}}"></td>
                        <td><img src="{{asset($cms->Avatar)}}" style="width:2rem; height auto"></td>
                        <td>{{$cms->CategoryID}}</td>
                        <td>{{$cms->Title}}</td>
                        <td>{{$cms->Description}}</td>
                        <td>{{$cms->Content}}</td>
                        <td>{{$cms->Slug}}</td>
                        <td>{{$cms->ViewCount}}</td>
                        <td>{{$cms->Time}}</td>
                        <td>
                            <a href="#editModal" class="edit" data-toggle="modal" data-cmsid="{{$cms->CmsID}}" data-categoryid="{{$cms->CategoryID}}" data-avatar="{{$cms->Avatar}}" data-description="{{$cms->Description}}" data-title="{{$cms->Title}}" data-content="{{$cms->Content}}" data-slug="{{$cms->Slug}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteModal" class="delete" data-toggle="modal" data-cmsid="{{$cms->CmsID}}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <ul class="pagination">
                    <div class="d-flex justify-content-center">
                        {{$cmss->links()}}
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal HTML -->
<div id="addModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="addForm" method="post" action="{{route('admin.cms.create')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm nhãn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="Title" class="col-4 col-form-label">Tiêu đề</label>
                        <div class="col-8">
                            <input id="Title" name="Title" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Danh mục" class="col-4 col-form-label">Danh mục</label>
                        <div class="col-8">
                            <select class="form-control" name="CategoryID" id="CategoryID" required>
                                @foreach ($categories as $category)
                                <option value="{{$category->CategoryID}}">{{$category->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Slug" class="col-4 col-form-label">Slug</label>
                        <div class="col-8">
                            <input id="Slug" name="Slug" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Avatar" class="col-4 col-form-label">Ảnh đại diện</label>
                        <div class="col-8">
                            <input id="Avatar" name="Avatar" placeholder="Bạn có thể kéo ảnh vào đây" type="file" class="form-control-file" aria-describedby="AvatarHelpBlock">
                            <span id="AvatarHelpBlock" class="form-text text-muted">Nếu không có thay đổi bạn có thể để trống trường này</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Description" class="col-4 col-form-label">Mô tả</label>
                        <div class="col-8">
                            <input id="Description" name="Description" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Content" class="col-4 col-form-label">Nội dung</label>
                        <div class="col-8">
                            <textarea id="Content" name="Content" cols="40" rows="10" class="form-control" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" name="CmsID" id="CmsID">
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="editForm" method="post" action="{{route('admin.cms.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Sửa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="Titel" class="col-4 col-form-label">Tiêu đề</label>
                        <div class="col-8">
                            <input id="Title" name="Title" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Danh mục" class="col-4 col-form-label">Danh mục</label>
                        <div class="col-8">
                            <select class="form-control" name="CategoryID" id="CategoryID" required>
                                @foreach ($categories as $category)
                                <option value="{{$category->CategoryID}}">{{$category->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Slug" class="col-4 col-form-label">Slug</label>
                        <div class="col-8">
                            <input id="Slug" name="Slug" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Avatar" class="col-4 col-form-label">Ảnh đại diện</label>
                        <div class="col-8">
                            <input id="Avatar" name="Avatar" placeholder="Bạn có thể kéo ảnh vào đây" type="file" class="form-control-file" aria-describedby="AvatarHelpBlock">
                            <span id="AvatarHelpBlock" class="form-text text-muted">Nếu không có thay đổi bạn có thể để trống trường này</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Description" class="col-4 col-form-label">Mô tả</label>
                        <div class="col-8">
                            <input id="Description" name="Description" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Content" class="col-4 col-form-label">Nội dung</label>
                        <div class="col-8">
                            <textarea id="Content" name="Content" cols="40" rows="10" class="form-control" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" name="CmsID" id="CmsID">
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
        modal.find('#CmsID').val(button.data('cmsid'));
        modal.find('#CategoryID').val(button.data('categoryid'));
        modal.find('#Title').val(button.data('title'));
        modal.find('#Slug').val(button.data('slug'));
        modal.find('#Content').val(button.data('content'));
        modal.find('#Description').val(button.data('description'));
    })

</script>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.cms.delete')}}" method="get">
                <div class="modal-header">
                    <h4 class="modal-title">Xoá</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xoá không?</p>
                    <p class="text-warning"><small>Thay đổi này không thể hoàn tác được. Hãy cẩn thận</small></p>
                </div>
                <input type="hidden" name="CmsID" id="CmsID" />
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
        modal.find('#CmsID').val(button.data('cmsid'));
    })

</script>
@endsection
