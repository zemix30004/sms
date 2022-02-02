@extends('layouts.layout', ['title'=>"Создать новый пост" ])

@section('content')

<form action="{{ route('posts.store') }}" id="" method="post" enctype="multipart/form-data">
    @csrf
    <h3>Создать пост</h3>
    @include('posts.parts.form')
    {{-- <div class="form-group">
        <input type="text" class="form-control" name="title" id="" required>
    </div>
    <div class="form-group">
        <textarea name="description" id="" rows="10" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <input type="file" name="image" id="">
    </div> --}}
        <input type="submit" value="Создать пост" id="" class="btn btn-outline-success">
</form>
@endsection
