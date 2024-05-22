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
                    <h1 class="m-0">{{ __('Добавить новость') }}</h1>
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
                            <form action="{{route('news')}}" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    @csrf
                                    <label for="title"> Тема статьи</label>
                                    <input type="text" name="title" placeholder="Введите тему"  id="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="text"> Текст статьи</label>
                                    <textarea type="text" name="text" class="form-control" id="text" placeholder="Введите текст" style="height: 250px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category">Выберите категорию</label>
                                    <select id="category" name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option name="category_id" value="{{$category->id}}">{{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <input type="file" name="file">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Отправить</button>
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
