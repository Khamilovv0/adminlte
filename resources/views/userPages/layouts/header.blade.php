<?php
use Illuminate\Support\Facades\DB;

$categories = DB::table('categories')->get();

?>
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="/"><img src="{{asset('images/icons/logo-001.png')}}" alt=""></a>
            </div>
        </div>
        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="">
                <a href="{{url('/')}}">Главная</a>
                @foreach($categories as $cat)
                    <li>
                        <a href="{{route('categoryNews', $cat->id)}}">{{$cat->category}}</a>
                    </li>
                @endforeach
                <li class="">
                    <a href="{{route('videos')}}">Видеоматериалы</a>
                </li>
            </ul>
        </div>
        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="/"><img src="{{asset('images/icons/logo-001.png')}}" alt="LOGO"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="{{url('userPages/index')}}">
                        <img src="{{asset('images/icons/logo-001.png')}}" alt="LOGO">
                    </a>

                    <ul class="main-menu">
                        <li class="">
                            <a href="{{url('/')}}">Главная</a>
                        </li>
                        @foreach($categories as $cat)
                            <li class="mega-menu-item">
                                <a href="{{route('categoryNews', $cat->id)}}">{{$cat->category}}</a>
                            </li>
                        @endforeach
                        <li class="">
                            <a href="{{route('videos')}}">Видеоматериалы</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
