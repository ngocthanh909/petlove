@extends('admin.layouts.layout')
@section('title', 'Danh mục nhãn hàng')
@section('heading', 'Danh nhãn hàng')
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
                        <th>Tên sản phẩm</th>
                        <th>Slug</th>
                        <th>SKU</th>
                        <th>Danh mục</th>
                        <th>Hãng</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Thời gian thêm</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><input type="checkbox" value="{{$product->ProductID}}"></td>
                        <td><img src="{{asset($product->Avatar)}}" style="width:2rem; height auto"></td>
                        <td>{{$product->Name}}</td>
                        <td>{{$product->Slug}}</td>
                        <td>{{$product->Sku}}</td>
                        <td>{{$product->CategoryID}}</td>
                        <td>{{$product->BrandID}}</td>
                        <td>{{$product->Description}}</td>
                        <td>{{$product->Price}}</td>
                        <td>{{$product->Time}}</td>
                        <td>
                            <a href="#editModal" class="edit" data-toggle="modal" data-productid="{{$product->ProductID}}" data-categoryid="{{$product->CategoryID}}" data-brandid="{{$product->BrandID}}" data-name="{{$product->Name}}" data-sku="{{$product->Sku}}" data-slug="{{$product->Slug}}" data-avatar="{{$product->Avatar}}" data-description="{{$product->Description}}" data-price="{{$product->Price}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteModal" class="delete" data-toggle="modal" data-productid="{{$product->ProductID}}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <ul class="pagination">
                    <div class="d-flex justify-content-center">
                        {{$products->links()}}
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
            <form id="addForm" method="post" action="{{route('admin.product.create')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm nhãn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-4 col-form-label" for="Name">Tên sản phẩm</label>
                        <div class="col-8">
                            <input id="Name" name="Name" placeholder="Tên sản phẩm" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CategoryID" class="col-4 col-form-label">Danh mục</label>
                        <div class="col-8">
                            <select id="CategoryID" name="CategoryID" class="custom-select" required="required">
                                @foreach($categories as $category)
                                <option value="{{$category->CategoryID}}">{{$category->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BrandID" class="col-4 col-form-label">Hãng</label>
                        <div class="col-8">
                            <select id="BrandID" name="BrandID" class="custom-select">
                                @foreach($brands as $brand)
                                <option value="{{$brand->BrandID}}">{{$brand->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Sku" class="col-4 col-form-label">SKU</label>
                        <div class="col-8">
                            <input id="Sku" name="Sku" placeholder="Mã vạch" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Slug" class="col-4 col-form-label">Slug</label>
                        <div class="col-8">
                            <input id="Slug" name="Slug" placeholder="Slug" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Avatar" class="col-4 col-form-label">Avatar</label>
                        <div class="col-8">
                            <input id="Avatar" name="Avatar" placeholder="Ảnh đại diện" type="file" class="form-control-file" required="required">
                            <span id="AvatarHelpBlock" class="form-text text-muted">Nếu không có tệp nào được chọn, Aavtar sản phẩm sẽ được giữ nguyên</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Price" class="col-4 col-form-label">Giá</label>
                        <div class="col-8">
                            <input id="Price" name="Price" placeholder="Giá" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Description" class="col-4 col-form-label">Mô tả sản phẩm</label>
                        <div class="col-8">
                            <textarea id="Description" name="Description" cols="40" rows="10" class="form-control"></textarea>
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
            <form id="editForm" method="post" action="{{route('admin.product.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm nhãn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-4 col-form-label" for="Name">Tên sản phẩm</label>
                        <div class="col-8">
                            <input id="Name" name="Name" placeholder="Tên sản phẩm" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CategoryID" class="col-4 col-form-label">Danh mục</label>
                        <div class="col-8">
                            <select id="CategoryID" name="CategoryID" class="custom-select" required="required">
                                @foreach($categories as $category)
                                <option value="{{$category->CategoryID}}">{{$category->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BrandID" class="col-4 col-form-label">Hãng</label>
                        <div class="col-8">
                            <select id="BrandID" name="BrandID" class="custom-select">
                                @foreach($brands as $brand)
                                <option value="{{$brand->BrandID}}">{{$brand->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Sku" class="col-4 col-form-label">SKU</label>
                        <div class="col-8">
                            <input id="Sku" name="Sku" placeholder="Mã vạch" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Slug" class="col-4 col-form-label">Slug</label>
                        <div class="col-8">
                            <input id="Slug" name="Slug" placeholder="Slug" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Avatar" class="col-4 col-form-label">Avatar</label>
                        <div class="col-8">
                            <input id="Avatar" name="Avatar" placeholder="Ảnh đại diện" type="file" class="form-control-file">
                            <span id="AvatarHelpBlock" class="form-text text-muted">Nếu không có tệp nào được chọn, Aavtar sản phẩm sẽ được giữ nguyên</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Price" class="col-4 col-form-label">Giá</label>
                        <div class="col-8">
                            <input id="Price" name="Price" placeholder="Giá" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Description" class="col-4 col-form-label">Mô tả sản phẩm</label>
                        <div class="col-8">
                            <textarea id="Description" name="Description" cols="40" rows="10" class="form-control"></textarea>
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
<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('#ProductID').val(button.data('productid'));
        modal.find('#BrandID').val(button.data('brandid'));
        modal.find('#CategoryID').val(button.data('categoryid'));
        modal.find('#Name').val(button.data('name'));
        modal.find('#Slug').val(button.data('slug'));
        modal.find('#Price').val(button.data('price'));
        modal.find('#Sku').val(button.data('sku'));
        modal.find('#Description').val(button.data('description'));
    })
</script>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.product.delete')}}" method="get">
                <div class="modal-header">
                    <h4 class="modal-title">Xoá</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xoá không?</p>
                    <p class="text-warning"><small>Thay đổi này không thể hoàn tác được. Hãy cẩn thận</small></p>
                </div>
                <input type="hidden" name="ProductID" id="ProductID"/>
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
        modal.find('#ProductID').val(button.data('productid'));
    })
</script>
@endsection
