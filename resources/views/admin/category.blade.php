@extends('admin.layouts.layout')
@section('title', 'Danh mục sản phẩm')
@section('heading', 'Danh mục sản phẩm')
@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @php
            $response = session()->pull('response', null);
            @endphp
            @isset($response)
            @if($response['status'] == 1)
            <div class="alert alert-success">
                {{$response['msg']}}
            </div>
            @elseif($response['status'] == 0)
            <div class="alert alert-warning">
                {{$response['msg']}}
            </div>
            @endif
            @endisset </div>
    </div>
    <div class="row">
        <div class="col-md-4 border-right">
            <form method="get" action="{{route('themdanhmuc')}}">
                <h5>Tạo danh mục mới</h5>
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" id="category-name" name="tendanhmuc" placeholder="Tên danh mục" required>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug được tạo tự động, có thể hiệu chỉnh" required>
                </div>
                <div class="form-group">
                    <label for="sel1">Danh mục cha</label>
                    <select class="form-control" name="danhmuccha" required>
                        <option value="0">Danh mục gốc</option>
                        @foreach ($categories as $category)
                        @include('admin.layouts.categoryselect', ['category' => $category, 'char' => ''])
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tạo danh mục</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <form method="get" action="{{route('xoadanhmuc')}}" id="category-table">
                <h5>Quản lý danh mục</h5>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        @include('admin.layouts.categorytable', ['category' => $category, 'no' => $char = ''])
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal sửa -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="get" id="edit-form" action="{{route('suadanhmuc')}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" id="category-id" name="id" placeholder="ID" required>
                    </div>
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" class="form-control" id="category-name" name="tendanhmuc" placeholder="Tên danh mục" required>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug được tạo tự động, có thể hiệu chỉnh" required>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Danh mục cha</label>
                        <select class="form-control" id="parent-id" name="danhmuccha" required>
                            <option value="0">Danh mục gốc</option>
                            @foreach ($categories as $category)
                            @include('admin.layouts.categoryselect', ['category' => $category, 'char' => ''])
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="edit-btn" class="btn btn-primary">Tạo danh mục</button>
                </div>
            </form>
        </div>
    </div>
    <!--Modal xoá-->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="get" id="edit-form" action="{{route('suadanhmuc')}}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" id="category-id" name="id" placeholder="ID" required>
                        </div>
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" id="category-name" name="tendanhmuc" placeholder="Tên danh mục" required>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug được tạo tự động, có thể hiệu chỉnh" required>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Danh mục cha</label>
                            <select class="form-control" id="parent-id" name="danhmuccha" required>
                                <option value="0">Danh mục gốc</option>
                                @foreach ($categories as $category)
                                @include('admin.layouts.categoryselect', ['category' => $category, 'char' => ''])
                                @endforeach
                            </select>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" id="edit-btn" class="btn btn-primary">Tạo danh mục</button>
            </div>
            </form>
        </div>
    </div>
    <!--END Modal xoá-->
</div>
<script>
    $('#modal-edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var category = button.data('category')
        var slug = button.data('slug')
        var parentid = button.data('parentid')
        var modal = $(this)
        modal.find('.modal-title').text('Sửa danh mục ' + category)
        modal.find('#category-id').val(id)
        modal.find('#category-name').val(category)
        modal.find('#slug').val(slug)
        modal.find('#parent-id').val(parentid)
    })

</script>
@endsection
