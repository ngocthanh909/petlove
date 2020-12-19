<form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="Avatar">
    <input type="submit" value="Upload">
</form>