@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class=" container">
                    <h1 class="m-0"> <strong>{{ __('Новости') }}</strong></h1>
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
                        @foreach($cat as $article)
                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title"><strong>{{ $article->title }}</strong></h1>
                                        <p class="card-text">
                                            <img class="card-img" src="{{$article->file}}" alt="">
                                        <hr>
                                        <p>{!!Str::limit($article->text, 150)!!}</p>
                                        </p>
                                    </div>
                                    <a href="{{route('one-news', $article->id)}}"><input type="button" name="button" class="col-2 btn btn-primary" style="margin-left:10px;" value="Подробнее"></a>
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
