@extends('layouts.layout')

@section('content')

<form action="" id="" method="post" enctype="multipart/form-data">
    @csrf
    <h3>Создать пост</h3>
    <div class="form-group">
        <input type="text" class="form-control" name="title" id="" required>
            <div class="form-group">
        <textarea name="description" id="" rows="10" class="form-control" required></textarea>
        </div>
            <input type="file" id="">
        <input type="submit" value="Создать пост" id="" class="btn btn-outline-success">
    </div>
</form>

@endsection
