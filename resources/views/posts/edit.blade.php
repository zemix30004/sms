@extends('layouts.layout', ['title'=>"Редактировать пост №$post->post_id" ])

@section('content')

<form action="{{ route('posts.update', ['id'=>$post->post_id]) }}" id="" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <h3>Редактировать пост</h3>
    @include('posts.parts.form')
        <input type="submit" value="Редактировать пост" id="" class="btn btn-outline-success">
    </div>
</form>

@endsection
