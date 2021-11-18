@extends('../layouts.app')

@section('content')
    <form action="/upload/image" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="photo">画像ファイル</label>
        <input type="file" class="form-control" name="file">
        <br>
        <input type="submit" value="アップロード">
    </form>
@endsection











