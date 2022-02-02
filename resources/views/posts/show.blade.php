@extends('layouts.layout', ['title'=>"Пост № $post->post_id. $post->title" ])

@section('content')


            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header"><h2>{{ $post->title }}</h2></div>
                    <div class="card-body">
                        <div class="card-img card-img__max" style="background-image: url({{ $post->image ?? asset('img/default.jpg') }})"></div>
                        <div class="card-description">Описание: {{ $post->description }}</div>
                        <div class="card-author">Автор: {{ $post->name }}</div>
                        <div class="card-date">Пост создан: {{ $post->created_at->diffForHumans() }}</div>
                        <div class="card-btn">
                                    <a href="{{ route('posts.index') }}" class="btn btn-outline-primary" id="">На главную</a>
                                    <a href="{{ route('posts.edit', ['id'=>$post->post_id]) }}" class="btn btn-outline-success" id="">Редактировать</a>
                                    <form action="{{ route('posts.destroy', ['id'=>$post->post_id] )}}"
                                        class="" method="post" onsubmit="if(confirm('Точно удалить пост?')){return true} else {return false}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" id="" class="btn btn-outline-danger" value="Удалить">
                                    </form>
                                    {{-- <a href="{{ route('posts.destroy', ['id'=>$post->post_id]) }}" class="btn btn-outline-danger" id="">Удалить</a> --}}
                        </div>
                    </div>
                    </div>
                </div>

            </div>
@endsection
