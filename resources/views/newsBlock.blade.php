@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class=" container">
                    <h1 class="m-0"> <strong>{{ __('Новости') }}</strong></h1>
                </div><!-- /.col -->
                @include('inc.success')
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($data as $element)
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-title"><strong>{{ $element->title }}</strong></h1>
                                    <p class="card-text">
                                        <img src="{{$element->file}}" alt="">
                                        <hr>
                                        <p>{!!Str::limit($element->text, 150)!!}</p>
                                    </p>
                                </div>
                                <a href="{{route('one-news', $element->id)}}"
                                   style="padding-bottom: 10px;">
                                    <input type="button"
                                           name="button"
                                           class="col-2 btn btn-primary"
                                           style="margin-left:10px;"
                                           value="Подробнее">
                                </a>
                                <a href="{{route('news-delete', $element->id)}}">
                                    <input type="submit"
                                           class="col-2 btn btn-primary"
                                           value="Удалить"
                                           style="margin-left:10px;">
                                </a>
                                <br>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
