<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">&times;</a>
    @foreach ($categories as $root)
        @if ($root->ParentID == 0)
            <a href="#" data-toggle="collapse" data-target="#sideCollapse{{$root->CategoryID}} ">{{$root->Name}}</a>
            <div id="sideCollapse{{$root->CategoryID}}" class="collapse sidebar-collapse" data-parent="#mySidenav">
                @foreach ($categories as $sub)
                    @if($sub->ParentID == $root->CategoryID)
                        <a href="{{ route('user.collection', $sub->Slug) }}" style="font-size: 13px">{{$sub->Name}}</a>
                    @endif    
                @endforeach
            </div> 
        @endif
    @endforeach
</div>