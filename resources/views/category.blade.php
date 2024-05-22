@extends('layouts.app')

@section('content')

    @php
        use Illuminate\Support\Facades\DB;

        $cat = DB::table('categories')->get();


    @endphp
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Категории') }}</h1>
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
                    <div class="alert alert-info">
                        <h4>Добавить категорию</h4>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <form action="{{route('add-category')}}" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        @csrf
                                        <label for="category">Название категории</label>
                                        <input type="text" name="category" class="form-control" id="category" placeholder="Категория">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="width: 200px;">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @include('inc.success')

                    <div class="alert alert-primary">
                        <h4>Список категорий</h4>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Название категории</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cat as $category)
                                    <tr>
                                        <td>{{ $category->category }}</td>
                                        <td></td>
                                        <td><a href="{{route('category-delete', $category->id)}}"><input type="submit" class="btn btn-primary" value="Удалить"></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
