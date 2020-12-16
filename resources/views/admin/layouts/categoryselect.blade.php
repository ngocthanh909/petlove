        <option value="{{$category->id}}">{{$char}}{{$category->tendanhmuc}}</option>

        @isset($category->children)
        <ul>
            @foreach($category->children as $category)
            @include('admin.layouts.categoryselect', ['category' => $category, 'char' => $char.' '])
            @endforeach
        </ul>
        @endisset
