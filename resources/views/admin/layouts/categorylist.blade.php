<div class="form-check">
      <label class="form-check-label" for="check1">
        <input type="checkbox" class="form-check-input" id="check1" name="id-danh-muc" value="{{$category->id}}">{{ $category->tendanhmuc }}>
      </label>
    </div>

	@isset($category->children)
	    <ul>
	    @foreach($category->children as $category)
	        @include('admin.layouts.categorylist', ['category' => $category])
	    @endforeach
	    </ul>
	@endisset