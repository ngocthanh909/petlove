<div class="form-check">
    <tr>
        <th scope="row"><input type="checkbox" id="check1" name="id" value="{{$category->id}}"></th>
        <td>{{$char . $category->tendanhmuc}}</td>
        <td>{{$category->slug}}</td>
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit" data-id="{{$category->id}}" data-category="{{$category->tendanhmuc}}" data-slug="{{$category->slug}}" data-parentid="{{$category->danhmuccha}}">
                Sửa
            </button></td>
    </tr>
</div>

@isset($category->children)
<ul>
    @foreach($category->children as $category)
    @include('admin.layouts.categorytable', ['category' => $category, 'char' => $char . '-'])
    @endforeach
</ul>
@endisset
