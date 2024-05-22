@extends('layouts.app')

@php
    use Illuminate\Support\Facades\DB;

    $categories = DB::table('categories')->orderBy('id', 'desc')->get();

@endphp

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Добавить видеоматериалы') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- form start -->
                            @if ($errors -> any())
                                <div class="alert" style="background-color: #f8d7da; border-color: #f5c6cb;">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @include('inc.success')
                            <form method="POST" action="{{ route('forVideos') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Тема видео" ">
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea name="description" id="description" class="form-control" placeholder="Введите описание к видео"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="video_url">
                                        Ссылка на видео
                                        <ol style="color: #808080;">
                                            <li>Откройте видео в ютубе.</li>
                                            <li>Нажмите на кнопку поделиться</li>
                                            <li>Нажмите на кнопку встроить</li>
                                            <li>Скопируйте ссылку внутри тега src="  "</li>
                                        </ol>
                                    </label>
                                    <input type="url" name="video_url" id="video_url" class="form-control" placeholder="Введите ссылку на видео">
                                    <div class="form-group">
                                        <label for="category_id">Категория</label>
                                        <select type="text" name="category_id" class="form-control" id="category_id">
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Загрузить видео</button>
                            </form>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
