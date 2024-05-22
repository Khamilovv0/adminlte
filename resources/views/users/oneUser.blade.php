@extends('layouts.app')

@section('title_blog')

@endsection

@section('content')
    <br>
    <div class="container">
        <h1>Данные о опользователе</h1>
        <hr>
        <h5>ФИО пользователя: {{$data->name}}</h5>
        <hr>
        <h5>E-mail: <a href="mailto:{{$data->email}}" style="text-decoration: none; "> {{$data->email}}</a></h5>
        <hr>
        <h5>Дата создания аккаунта: {{$data->created_at}}</h5>
        <hr>
        <p></p>
    </div>
@endsection
