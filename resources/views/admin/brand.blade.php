@extends('admin.layouts.layout')
@section('title', 'Danh mục nhãn hàng')
@section('heading', 'Danh nhãn hàng')
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
            <form method="get" action="{{route('themnhanhang')}}">
                <h5>Tạo danh mục mới</h5>
                <div class="form-group">
                    <label>Tên nhãn hàng</label>
                    <input type="text" class="form-control" id="category-name" name="tenhang" placeholder="Tên hãng" required>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug được tạo tự động, có thể hiệu chỉnh" required>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control" id="mota" name="mota" placeholder="Mô tả" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tạo nhãn hàng</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <form method="get" action="{{route('suanhanhang')}}" id="category-table">
                <h5>Quản lý danh mục</h5>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên nhãn hàng</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col=">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1
                        @endphp
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$brand->tenhang}}</td>
                            <td>{{$brand->slug}}</td>
                            <td>{{$brand->mota}}</td>
                            <td><a class="btn btn-danger" href="{{route('xoanhanhang')}}?id={{$brand->id}}">Xoá</a><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit" data-id="{{$brand->id}}" data-brand="{{$brand->tenhang}}" data-slug="{{$brand->slug}}" data-description="{{$brand->mota}}">
                                    Sửa
                                </button></td>
                        <tr>
                            @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Modal sửa -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="get" id="edit-form" action="{{route('suanhanhang')}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" id="brand-id" name="id" placeholder="ID" required>
                    </div>
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" class="form-control" id="brand-name" name="tenhang" placeholder="Tên hãng" required>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug được tạo tự động, có thể hiệu chỉnh" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text" class="form-control" id="brand-description" name="mota" placeholder="Slug được tạo tự động, có thể hiệu chỉnh" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="edit-btn" class="btn btn-primary">Sửa danh mục</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#modal-edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var brand = button.data('brand')
        var slug = button.data('slug')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-title').text('Sửa danh mục ' + brand)
        modal.find('#brand-id').val(id)
        modal.find('#brand-name').val(brand)
        modal.find('#slug').val(slug)
        modal.find('#brand-description').val(description)
    })

</script>
@endsection
