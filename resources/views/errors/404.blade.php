@extends('layouts.layout', ['title'=>"404 ошибка. Вы попали не туда!" ])

@section('content')

<div class="card">
    <h2 class="card-header">Дружище точно не туда попал!!!(404 ошибка)</h2>
    <img src="{{ asset('img/default.jpg') }}" alt="" class="">
    <a href="/" class="btn btn-outline-primary" id="">Срочно вернуться на главную</a>
</div>

@endsection
