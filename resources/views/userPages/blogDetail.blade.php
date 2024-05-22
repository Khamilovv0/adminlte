@extends('userPages.layouts.userApp')

@section('content')

    @php
        use Carbon\Carbon;

        $createdAt = Carbon::parse($one->created_at);
        $formattedDate = $createdAt->format('d.m.Y');

    @endphp
        <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="/" class="breadcrumb-item f1-s-3 cl9">
                    Главная
                </a>

                <a href="#" class="breadcrumb-item f1-s-3 cl9">
                    Статьи
                </a>

                <span href="#" class="breadcrumb-item f1-s-3 cl9">
					 {{$one->title}}
				</span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="bg0 p-b-140 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">

                            <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                                {{$one->title}}
                            </h3>

                            <div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
										@php echo $formattedDate @endphp
									</span>
								</span>

                                <span class="f1-s-3 cl8 m-r-15">
									|
								</span>

                                <span class="f1-s-3 cl8 m-r-15">
                                    <i class=" nav-icon fa fa-eye" aria-hidden="true"></i>
									{{$one->views}}
								</span>
                            </div>
                            <div class="wrap-pic-max-w p-b-30">
                                <img src="{{asset('storage/' . $one->file)}}" alt=""></a>
                            </div>
                            <hr>
                            <p style="font-size: 19px; font-family: Roboto, sans-serif; color: #000000">
                                {!!$one->text!!}
                            </p>
                            <hr>
                            <!-- Share -->
                            <div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15 text-black">
									Поделиться:
								</span>

                                <div class="flex-wr-s-s size-w-0">
                                    <a href="#"
                                       class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-facebook-f m-r-7"></i>
                                        Facebook
                                    </a>

                                    <a href="#"
                                       class="dis-block f1-s-13 cl0 bg-youtube borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-youtube m-r-7"></i>
                                        YouTube
                                    </a>

                                    <a href="#"
                                       class="dis-block f1-s-13 cl0 bg-instagram borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-instagram m-r-7"></i>
                                        instagram
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Leave a comment -->
                        <div>
                            <h4 class="f1-l-4 cl3 p-b-12">
                                Написать комментарий
                            </h4>

                            <p class="f1-s-13 cl8 p-b-40">
                                Ваш почтовый адрес не будет виден другим
                                <br>
                                Обязательные поля помечены *
                            </p>

                            <form action="{{route('userComment', $one->id)}}" method="post">
                                @csrf
                                @if ($errors -> any())
                                    <div class="alert" style="background-color: #f8d7da; border-color: #f5c6cb;">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <label>
                                    <textarea
                                        class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20"
                                        name="message" placeholder="Комментарий..."></textarea>
                                </label>

                                <label>
                                    <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20"
                                           type="text" name="name" placeholder="Имя*">
                                </label>

                                <label>
                                    <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20"
                                           type="text" name="email" placeholder="Почта*">
                                </label>
                                @include('inc.success')
                                <button name="submit"
                                        class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10"
                                        type="submit">
                                    Опубликовать комментарий
                                </button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    {{--<div class="container">
                        <div class="container my-5 py-5">
                            <div class="row ">
                                <div>
                                    <div class="text-dark">
                                        <div class="card-body">
                                            <h1 style="font-size: 18px"><strong>Комментарии</strong></h1>
                                            <hr class="my-0"/>
                                            <br>
                                            @foreach($comments as $comment)
                                                @php
                                                    $created_at = Carbon::parse($comment->created_at)->addHours('3');
                                                    $formatDate = $created_at->format('d.m.Y H:m');
                                                @endphp
                                                <div class="d-flex flex-start">
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                         src="https://yt3.ggpht.com/5ncn8-Qe5tCumII7F9e_nCb3HQnQuutmYXm5qVsCHoEW9gLwxrIdk-sq-wimIgXs8aov3TaxWUk=s900-c-k-c0x00ffffff-no-rj"
                                                         alt="avatar" width="60"
                                                         height="60">
                                                    <div style="margin-left: 10px !important">
                                                        <h6 class="fw-bold mb-1">{{$comment->name}}</h6>
                                                        <div class="d-flex align-items-center mb-3">
                                                            <p class="mb-0">
                                                                @php echo $formatDate @endphp
                                                            </p>
                                                        </div>
                                                        <p class="mb-0">
                                                            {{$comment->message}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr class="my-0"/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
                <!-- Sidebar -->
                @include('userPages.layouts.sidebar')
            </div>
        </div>
    </section>
@endsection
