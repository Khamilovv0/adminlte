@extends('userPages.layouts.userApp')

@section('content')
    @php
        use Illuminate\Support\Facades\DB;

        $articles = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.category', 'category')
            ->orderBy('created_at', 'desc')
            ->get();
        $list = DB::table('videos')->orderBy('id', 'desc')->get();
        $categories = DB::table('categories')->get();
    @endphp
        <!-- Headline -->
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
                    <span class="text-uppercase cl2 p-r-8">
                        Новинки портала:
                    </span>
                <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown"
                      data-out="fadeOutDown">
                    @foreach($articles as $title)
                        <span class="dis-inline-block slide100-txt-item animated visible-false">
                            {{$title->title}}
                        </span>
                    @endforeach
                </span>
            </div>
        </div>
    </div>

    <!-- Feature post -->
    <section class="bg0">
        <div class="container">
            <div class="row m-rl--1">
                @foreach($articles->take(2) as $all)
                    <div class="col-md-6 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url('{{ asset('storage/' . $all->file) }}');">

                        <a href="{{route('userNews', $all->id)}}" class="dis-block how1-child1 trans-03"></a>
                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="#"
                                   class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$all->category}}
                                </a>
                                <h3 class="how1-child2 m-t-14 m-b-10">
                                    <a href="{{route('userNews', $all->id)}}"
                                       class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                        {{$all->title}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Post -->
    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-35">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Видеоматериалы
                            </h3>
                        </div>
                        <div>
                            @foreach($list->take(1) as $video)
                                <div class="wrap-pic-w pos-relative">
                                    <div class="bd-example">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="{{asset($video->video_url)}}"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-tb-16 p-rl-25 bg3">
                                    <h5 class="p-b-5">
                                        <hr style="color: white; border: none; background-color: white; height: 2px;">
                                        <a class="f1-m-3 cl0 hov-cl10 trans-03" style="color: white;">
                                            {{$video->title}}
                                        </a>
                                        <hr style="color: white; border: none; background-color: white; height: 2px;">
                                    </h5>
                                    <span class="cl15">
                                        <a class="f1-s-4 cl8 hov-cl10 trans-03" style="color: #00CFDD; font-size: 16px">
                                            {{$video->description}}
                                        </a>
                                    </span>
                                </div>
                                <br>
                                <a class="btn btn-primary" href="{{route('videos')}}">Смотреть еще</a>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="p-b-55">
                                <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                                    <h3 class="f1-m-2 cl3 tab01-title">
                                        Последние новости
                                    </h3>
                                </div>
                                <div class="row p-t-35">
                                    @foreach($articles->take(6) as $news)
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991" style="padding-bottom: 30px;">
                                            <!-- Item latest -->
                                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                                 style="background-image: url('{{ asset('storage/' . $news->file) }}')">
                                                <a href="{{route('userNews', $news->id)}}"
                                                   class="dis-block how1-child1 trans-03"></a>
                                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                                    <a href="#"
                                                       class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                                        {{$news->category}}
                                                    </a>
                                                    <h3 class="how1-child2 m-t-14 m-b-10">
                                                        <a href="{{route('userNews', $news->id)}}"
                                                           class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03"
                                                           style="font-size: 16px">
                                                            {{$news->title}}
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner animated data">
                        <div class=" big-text animated tada">Скидки до 95%</div>
                        <div>Ваша реклама</div>
                        <a href="#">Перейти в магазин</a>
                    </div>
                </div>
                @include('userPages.layouts.sidebar')
            </div>
        </div>
    </section>
@endsection
<style>
    .banner {
        width: 100%;
        height: 18%;
        background:url(http://s6.favim.com/orig/150112/background-cold-gif-nature-Favim.com-2380226.gif);
        /*https://i0.wp.com/media.giphy.com/media/5ERaOy5fQEIAU/giphy.gif*/
        background-size: cover;
        font-size: 80px;
        color: #fff;
        text-align: center;
        padding: 80px 20px;
    }

    .big-text {
        font-size: 30px;
        font-weight:800;
        animation-delay: 1s;
    }
    .banner a {
        display: inline-block;
        background: #fff;
        color: #36465d;
        text-transform: uppercase;
        padding: 15px;
        text-decoration: none;
        font-size: 30px;
        transition: .3s;
    }
    .banner a:hover {
        background: #333;
        color: #fff;
        padding: 15px 20px;
    }
</style>
