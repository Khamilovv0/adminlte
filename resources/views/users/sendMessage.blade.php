@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users') }}</h1>
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
                    <div class="alert alert-primary">
                        Список пользователей
                    </div>
                    @foreach($users as $user)
                        <form action="{{route('send')}}" method="post">
                                <input type="email" name="email" value="{{$user->email}}">
                            <textarea name="message" placeholder="Enter message"></textarea>
                            <button type="submit">Send</button>
                        </form>
                    @endforeach
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.content -->
@endsection
