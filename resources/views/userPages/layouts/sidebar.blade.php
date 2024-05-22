@php
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use App\Models\news;

    $month = DB::table('month')->get();
    $news = DB::table('news')->orderBy('created_at', 'desc')->get();
    $category = DB::table('categories')->get();
    $mostViewedArticles = news::mostViewedLastMonth();
@endphp
<style>
    .column {
        flex-basis: 50%;
        margin: 0;
        padding: 0;
        position: relative;
    }

    .column::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left:108%;
        border-left: 1px solid #ccc;
    }

    li {
        position: relative;
        padding-bottom: 10px;
    }

    li::after {
        content: "";
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        border-bottom: 1px solid #ccc;
    }
</style>

<div class="col-md-10 col-lg-4">
    <a href="https://www.aviasales.kz/" class="hpd hpd-small partner">
        <div class="hpd-body">
            <h4 class="hpd-title">Перелеты в любую точку</h4>
            <p class="hpd-desc">Удобнее с aviasales.kz</p>
        </div>
        <span href="https://www.aviasales.kz/" class="hpd-btn">Посетить <span class="hpd-kickstarter">сайт</span> &#8594;</span>
    </a>
        <div style="columns: 2 !important;  display: flex !important; padding-top: 30px">
        <!-- Category -->
            <div class="p-b-60 column">
                <div class="how2 how2-cl4 flex-s-c">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Категории
                    </h3>
                </div>

                <ul class="p-t-27">
                    @foreach($category as $cat)
                        <li class="p-rl-4" style="margin-bottom: 15px !important;">
                            <a href="{{route('categoryNews', $cat->id)}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                                {{$cat->category}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- Archive -->
            <div class="p-b-37 p-l-31">
                <div class="how2 how2-cl4 flex-s-c" style="width: 160px !important;">
                    <h3 class="f1-m-2 cl3 tab01-title ml-2">
                        Архив
                    </h3>
                </div>
                <ul class="p-t-32" style="font-size: 14px !important;">
                    @foreach($month as $list)
                        <li class="p-rl-3 p-b-15 p-t-6">
                            <a href={{route('sortByMonth', $list->number)}}"" class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03">
                            <span>
                                {{$list->name}}
                            </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <br>
    <!-- Popular Posts -->
        <div>
            <div class="how2 how2-cl4 flex-s-c">
                <h3 class="f1-m-2 cl3 tab01-title">
                    Недавние новости
                </h3>
            </div>

            <ul class="p-t-35">
                @foreach($mostViewedArticles as $all)
                    <li class="flex-wr-sb-s p-b-30 p-t-30">
                        <a href="{{route('userNews', $all->id)}}" class="size-w-10 wrap-pic-w hov1 trans-03">
                            <img src="{{asset('storage/' . $all->file)}}" alt="IMG">
                        </a>

                        <div class="size-w-11">
                            <h6 class="p-b-4">
                                <a href="{{route('userNews', $all->id)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                    {{$all->title}}
                                </a>
                            </h6>
                            @php
                                $createdAt = Carbon::parse($all->created_at);
                                $formatDate = $createdAt->format('d.m.Y');
                            @endphp
                            <span class="cl8 txt-center p-b-24">
                                <span class="f1-s-3">
                                    @php echo $formatDate @endphp
                                </span>
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
