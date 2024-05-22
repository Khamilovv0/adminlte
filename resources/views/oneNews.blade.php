@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class=" container">
                    <h1 class="m-0"> <strong>Новости</strong></h1>
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
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="m-0"><strong>{{$one->title}}</strong></h1>
                                <br>
                                <h1 class="card-title"><strong>{{$one->created_at}}</strong></h1>
                                <br>

                                <p>
                                    <strong>Просмотры: </strong>
                                    {{$one->views}}
                                </p>

                                <hr>
                                <p class="card-text">
                                    <img class="img-fluid" src="{{asset('storage/' . $one->file)}}" alt="" style="width: 1000px; margin: 10px auto 20px; display: block;">
                                    <hr>
                                    <p style="font-size: 19px; font-family: Roboto, sans-serif;">
                                        {!!$one->text!!}
                                    </p>
                                </p>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
