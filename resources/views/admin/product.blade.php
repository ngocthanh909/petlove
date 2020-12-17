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
                        <input type="text" id="searchbyname">
                        <input type="text" id="searchbyname">
                        <input type="text" id="searchbyname">
                        <a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        <a href="#deleteModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Tên sản phẩm</th>
                        <th>Hãng</th>
                        <th>SKU</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Thời gian thêm</th>
                        <th>Avatar</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>Demo</td>
                        <td>
                            <a href="#editModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
            <div class="clearfix">
                <input type="number" id="item" value="10" /> <label>Số sản phẩm/ trang</label>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var data = {
            "item": $('#item').val()
        }
        var rowTemplate = '<tr>' +
            '<td><%this.id%> </td>' +
            '<td><%this.danhmuc%> </td>' +
            '<td><%this.phone%> </td>' +
            '</tr>';
        console.log(data.item);
        $.ajax({
            type: "get"
            , url: "{{route('danhsachsanpham')}}"
            , cache: false
            , data: data
            , dataType: "json"
            , success: function(response) {
                console.log(data)
            }
            , error: function() {
                alert("Error");
            }
        });
    })

</script>
<!-- Add Modal HTML -->
<div id="addModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="tensanpham" id="tensanpham-a" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <select class="form-control" name="phanloai" id="phanloai-a">
                            <option value=1>Hehe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="danhmuc" id="danhmuc-a">
                            <option value=1>Hehe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hãng</label>
                        <select class="form-control" name="hang" id="hang-a">
                            <option value=1>Hehe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" name="sku" id="sku-a" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" id="slug-a" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="gia" id="gia-a" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea type="text" name="mota" id="mota-a" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="tensanpham" id="tensanpham" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <select class="form-control" name="phanloai" id="phanloai">
                            <option>Hehe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="danhmuc" id="danhmuc">
                            <option>Hehe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hãng</label>
                        <select class="form-control" name="hang" id="hang">
                            <option>Hehe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" name="sku" id="sku" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="gia" id="gia" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea type="text" name="mota-edit" id="mota" class="form-control" required></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#mota')).catch(error => {
                                console.error(error);
                            });

                    </script>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
