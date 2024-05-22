<?php
    use Illuminate\Support\Facades\DB;

    $categories = DB::table('categories')->get();

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="{{'/home'}}" class="brand-link">
        <img src="{{ asset('images/icons/logo1.png') }}" alt="M-News"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">M-News</span>
    </a>
    <!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Пользователи') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-plus-square"></i>
                    <p>
                        {{ __('Добавить новость') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('forVideos') }}" class="nav-link">
                    <i class="nav-icon fas fa-download"></i>
                    <p>
                        {{ __('Загрузить видео') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('all-data') }}" class="nav-link">
                    <i class="nav-icon far fa-file"></i>
                    <p>
                        {{ __('Новости') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('all-video') }}" class="nav-link">
                    <i class="nav-icon fa  fa-server" aria-hidden="true"></i>
                    <p>
                        {{ __('Видео') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('category')}}" class="nav-link">
                    <i class="nav-icon fa fa-clone" aria-hidden="true"></i>
                    <p>
                        {{ __('Настройки категорий') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-bars nav-icon"></i>
                    <p>
                        Категории
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                @foreach($categories as $cat)
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                                <a href="{{route('cat_news', $cat->id)}}" class="nav-link">
                                    <i class="far fa-window-maximize nav-icon"></i>
                                    <p>{{$cat->category}}</p>
                                </a>
                        </li>
                    </ul>
                @endforeach
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
