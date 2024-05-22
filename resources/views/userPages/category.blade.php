@extends('userPages.layouts.userApp')

@section('content')
    @php
        use Carbon\Carbon;
        use Illuminate\Support\Facades\DB;

        $category = DB::table('categories')->get();
    @endphp
        <!-- Breadcrumb -->
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{url('/')}}" class="breadcrumb-item f1-s-3 cl9">
                    Главная
                </a>

                <a href="{{url('userPages/category-02')}}" class="breadcrumb-item f1-s-3 cl9">
                    Категории
                </a>
                @foreach($cat->take(1) as $categories)
                    @foreach($category as $id)
                        @if($categories->category_id == $id->id)
                            <span class="breadcrumb-item f1-s-3 cl9">
                                {{$id->category}}
                            </span>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <!-- Page heading -->
    <div class="container p-t-4 p-b-40">
        <h2 class="f1-l-1 cl2">
            @foreach($cat->take(1) as $categories)
                @foreach($category as $id)
                    @if($categories->category_id == $id->id)
                        {{$id->category}}
                    @endif
                @endforeach
            @endforeach
        </h2>
    </div>

    <!-- Feature post -->
    <section class="bg0">
        <div class="container">
            <div class="row m-rl--1">
                @foreach($cat->take(2) as $news)
                    <div class="col-md-6 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-3 how1 pos-relative"
                             style="background-image: url('{{ asset('storage/' . $news->file) }}')">
                            <a href="{{route('userNews', $news->id)}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="#"
                                   class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    <i class="nav-icon fa  fa-eye" aria-hidden="true"></i>
                                    {{$news->views}}
                                </a>

                                <h3 class="how1-child2 m-t-14 m-b-10">
                                    <a href="{{route('userNews', $news->id)}}"
                                       class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                        {{$news->title}}
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
    <section class="bg0 p-t-70 p-b-55">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-80">
                    <div class="row">
                        @foreach($cat as $catNews)
                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->
                                <div class="m-b-45">
                                    <a href="{{route('userNews', $catNews->id)}}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('storage/' . $catNews->file)}}" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="{{route('userNews', $catNews->id)}}"
                                               class="f1-m-3 cl2 hov-cl10 trans-03">
                                                {{$catNews->title}}
                                            </a>
                                        </h5>
                                        @php
                                            $created_at = Carbon::parse($catNews->created_at)->addHours('3');
                                            $formatDate = $created_at->format('d.m.Y H:m');
                                        @endphp
                                        <span class="cl8">
                                            <span class="f1-s-3">
                                                @php echo $formatDate @endphp
                                            </span>
                                            <span class="f1-s-3">
                                                 <i class="nav-icon fa  fa-eye" aria-hidden="true"
                                                    style="margin-left: 15px"></i>
                                                 {{$catNews->views}}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @include('userPages.layouts.sidebar')
            </div>
        </div>
    </section>
@endsection
