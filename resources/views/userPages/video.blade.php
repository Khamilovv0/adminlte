@extends('userPages.layouts.userApp')

@section('content')
    <!-- Breadcrumb -->
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="/" class="breadcrumb-item f1-s-3 cl9">
                    Главная
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
					Видео
				</span>
            </div>
        </div>
    </div>

    <!-- Page heading -->
    <div class="container p-t-4 p-b-40">
        <h2 class="f1-l-1 cl2">
            Видеоматериалы
        </h2>
    </div>
    <!-- Post -->
    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-b-55">
                        <!-- Item latest -->
                        @foreach($video as $all)
                            <div class="wrap-pic-w pos-relative">
                                <div class="bd-example">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{asset($all->video_url)}}"
                                                allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="p-tb-16 p-rl-25 bg3">
                                <h5 class="p-b-5">
                                    <hr style="color: white; border: none; background-color: white; height: 2px;">
                                    <a class="f1-m-3 cl0 hov-cl10 trans-03" style="color: white;">
                                        {{$all->title}}
                                    </a>
                                    <hr style="color: white; border: none; background-color: white; height: 2px;">
                                </h5>
                                <span class="cl15">
                                    <a class="f1-s-4 cl8 hov-cl10 trans-03" style="color: #00CFDD; font-size: 16px">
                                        {{$all->description}}
                                    </a>
                                </span>
                            </div>
                            <br>
                        @endforeach
                    </div>
                    {{ $video->links('pagination::bootstrap-5') }}
                </div>
                <!-- Sidebar -->
                @include('userPages.layouts.sidebar')
            </div>
        </div>
    </section>
    <!-- Back to top -->
@endsection


<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .page-item {
        margin: 0 5px;
    }

    .page-link {
        color: #2F4F98;
        background-color: #fff;
        border: 1px solid #2F4F98;
        border-radius: 5px;
    }

    .page-link:hover {
        color: #fff;
        background-color: #2F4F98;
        border-color: #2F4F98;
    }

    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #2F4F98;
    }

    .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #fff;
        border-color: #dee2e6;
    }

</style>
