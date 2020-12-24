

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">&times;</a>
    {{-- <a href="#" data-toggle="collapse" data-target="#sideColl1"><i class="fas fa-dog"></i>Shop cho chó</a>
    <div id="sideColl1" class="collapse sidebar-collapse">
        <a href="#">Shop Cho Mèo</a>
        <br>
    </div> --}}

    @foreach ($categories as $category)
        @if ($category->ParentID == 0)
            <a href="#" data-toggle="collapse" data-target="#sideCollapse{{$category->CategoryID}} ">{{$category->Name}}</a>
            <div id="sideCollapse{{$category->CategoryID}}" class="collapse sidebar-collapse" data-parent="#mySidenav">
                @foreach ($categories as $category2)
                    @if ($category2->ParentID == $category->CategoryID)
                        <a href="{{ route('user.collection', $category2->Slug) }}" style="font-size: 13px">{{$category2->Name}}</a>
                    @endif
                @endforeach
            </div>
        @endif
        
    @endforeach
    {{-- <a href="#">Shop Cho Mèo</a>
    <a href="#">Shop các vật nuôi khác</a> --}}
</div>