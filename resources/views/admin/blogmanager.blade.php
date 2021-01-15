@extends('admin.layouts.layout')
@section('title', 'Quản lý sản phẩm')
@section('heading', 'Danh sách sản phẩm')
@section('body')
<div class="container-fluid">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Quản lý sản phẩm</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm</span></a>
                        <a href="#deleteModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Xoá</span></a>
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
                        <th>Tên bài viết</th>
                        <th>Slug</th>
                        <th>Lượt xem</th>
                        <th>Hành động</th>
                        
                  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td><input type="checkbox" value="{{$blog->id}}"></td>
                        <td><img src="{{asset($blog->avatar)}}" style="width:2rem; height auto"></td>
                        <td>{{$blog->name}}</td>
                        <td>{{$blog->slug}}</td>
                        <td>{{$blog->viewCount}}</td>
                        <td>
                            <a href="#editModal" class="edit" data-toggle="modal" data-blogid="{{$blog->id}}" data-avatar="{{$blog->avatar}}" data-name="{{$blog->name}}"  data-description="{{$blog->content}}" data-slug="{{$blog->slug}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteModal" class="delete" data-toggle="modal" data-blogid="{{$blog->id}}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <ul class="pagination">
                    <div class="d-flex justify-content-center">
                        
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
            <form id="addForm" method="post" action="{{route('admin.blog.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm bài đăng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-4 col-form-label" for="Name">Avatar</label>
                        <div class="col-8">
                            <input id="Avatar" name="Avatar" placeholder="Ảnh đại diện" type="file" class="form-control-file">

                        </div>
                    </div>

          
                    <div class="form-group row">
                        <label for="Sku" class="col-4 col-form-label">Tên bài viết</label>
                        <div class="col-8">
                            <input id="PostTitle" name="PostTitle" placeholder="Tên bài viết" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Slug" class="col-4 col-form-label">Slug</label>
                        <div class="col-8">
                            <input id="Slug" name="Slug" placeholder="Slug" type="text" class="form-control" required="required"></input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Slug" class="col-4 col-form-label">Nội dung bài viết</label>
                        <div class="col-8">
                            <textarea id="Content" name="Content" placeholder="Nội dung bài viết" type="text" class="form-control" required="required"></textarea>
                            <script>
                            CKEDITOR.replace( 'Content', {
                                filebrowserUploadUrl: "{{route('ckEditorUpload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form'
                            } );
                            </script>
               
                        </div>
                    </div>
    
                    
                    
                    <input type="hidden" name="ProductID" id="ProductID">
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
            <form id="addForm" method="post" action="{{route('admin.blog.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Sửa bài viết</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-4 col-form-label" for="Name">Avatar</label>
                        <div class="col-8">
                            
                            <input id="Avatar" name="Avatar" placeholder="Ảnh đại diện" type="file" class="form-control-file">
                            <span id="AvatarHelpBlock" class="form-text text-muted">Nếu không có tệp nào được chọn, Avatar blog sẽ được giữ nguyên</span>
                        </div>
                    </div>

          
                    <div class="form-group row">
                        <label for="PostTitle" class="col-4 col-form-label">Tên bài viết</label>
                        <div class="col-8">
                            <input id="PostTitle" name="PostTitle" placeholder="Tên bài viết" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Slug" class="col-4 col-form-label">Slug</label>
                        <div class="col-8">
                            <input id="Slug" name="Slug" placeholder="Slug" type="text" class="form-control" required="required"></input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Slug" class="col-4 col-form-label">Nội dung bài viết</label>
                        <div class="col-8">
                            <textarea id="Content" name="Content" placeholder="Nội dung bài viết" type="text" class="form-control" required="required"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="BlogID" id="BlogID">
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
    $(document).ready(function() {
        $('#Status').on('change', function() {
            if ($('#Status').val() == 0) {
                $("#Rate").attr("disabled", "disabled");
            } else {
                $("#Rate").removeAttr("disabled", "disabled");
            }
        });
    })

</script>
<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var modal = $(this)
        // modal.find('#Avatar').val(button.data('avatar'));
        modal.find('#PostTitle').val(button.data('name'));
        modal.find('#Name').val(button.data('name'));
        modal.find('#Slug').val(button.data('slug'));
        modal.find('#Content').val(button.data('description'));
        modal.find('#BlogID').val(button.data('blogid'));
        // var textarea = modal.find('#Description2');
        modal.find('#Content').ckeditor({ filebrowserUploadUrl: "{{route('ckEditorUpload', ['_token' => csrf_token() ])}}", filebrowserUploadMethod: 'form' });
    })

</script>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.blog.remove')}}" method="get">
                <div class="modal-header">
                    <h4 class="modal-title">Xoá</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xoá không?</p>
                    <p class="text-warning"><small>Thay đổi này không thể hoàn tác được. Hãy cẩn thận</small></p>
                </div>
                <input type="hidden" name="BlogID" id="BlogID" />
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
        modal.find('#BlogID').val(button.data('blogid'));
    })

</script>
@endsection
