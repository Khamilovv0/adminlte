@extends('layouts.app')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class=" container">
                    <h1 class="m-0"> <strong>Видео</strong></h1>
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
                            <div class="card-body" style="columns: 2">
                                @foreach($videos as $video)
                                    <div class="bd-example" style="padding-bottom: 5px;">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="{{asset($video->video_url)}}" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div style="padding: 10px;">
                                {{ $videos->links('pagination::bootstrap-5') }}
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
