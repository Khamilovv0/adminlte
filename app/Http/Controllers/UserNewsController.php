<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Http\Requests\commentRequest;

class UserNewsController extends Controller
{
    public function byCategory($id)
    {
        $articles = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*')
            ->where('categories.id', $id)
            ->orderBy('views')
            ->get();
        return view('userPages.category', ['cat' => $articles]);
    }

    public function byVideo()
    {
        $video = DB::table('videos')->get();
        return view('userPages.index', ['list' => $video]);
    }

    public function forNews()
    {
        $article = DB::table('news')->orderBy('created_at', 'desc')->get();

        return view('index', ['articles' => $article]);
    }

    public function oneNews($news_id)
    {
        $news = news::find($news_id);
        $news->increment('views');
        $news->save();
        return view('userPages.blogDetail', ['one' => $news], compact('news'));

    }

    public function comment(commentRequest $request, $news_id)
    {
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->news_id = $news_id;
        $comment->save();

        return redirect()->back()->with('success', 'Ваш комментарий добавлен!');
    }

    public function month($month_id){

        $articles = DB::table('news')
            ->join('month', DB::raw('MONTH(news.created_at)'), '=', 'month.number')
            ->select('news.*')
            ->where('month.number', $month_id)
            ->orderBy('views', 'desc')
            ->get();
        return view('userPages.newsByMonth', ['byMonth' => $articles]);
    }

    public function video(){
        $forVideo = DB::table('videos')->orderBy('id', 'desc')->paginate(2);

        return view('userPages.video', ['video'=>$forVideo]);
    }


}
