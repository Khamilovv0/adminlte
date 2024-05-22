<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\newsRequest;
use App\Models\Category;
use App\Models\news;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function submit(newsRequest $request){
        $news = new news();
        $news->title = $request->title;
        $text = str_replace("\r\n", '<br>', $request->text);
        $news->text = $text;
        $news->category_id = $request->category_id;
        $file = $request->file('file');
        $news->file = $file->store('/', 'public');
        $news->save();
        return redirect()->back()->with('success', 'Данные успешно добавлены!');
    }

    public function allData(){
        $news = DB::table('news')->orderBy('id', 'desc')->get();
        return view('newsBlock', ['data' => $news]);

    }

    public function oneNews($id){
        $news = News::find($id);
        $news->increment('views');
        $news->save();
        return view ('oneNews', ['one'=>$news]);
    }


    public function catNews($id){
        $articles = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*')
            ->where('categories.id', $id)
            ->get();
        return view('newsByCategory', ['cat' => $articles]);
    }

    public function categories()
    {
        return view('category');
    }


    public function addCategory(CategoryRequest $request)
    {
        $addCategory = DB::table('categories')->where('category', $request->input('category'))
            ->first();

        if ($addCategory) {
            return redirect()->back()->with('error', 'Данная категория уже существует');
        }

        if (!$addCategory) {
            $newCategory = new Category();
            $newCategory->category = $request->category;
            $newCategory->save();
        }

        return redirect()->back()->with('success', 'Новая категория добавлена!');
    }

    public function deleteCategory($id){
        Category::find($id)->delete();
        return redirect()->back()->with('success', 'Данная категория успешно удалена');
    }

    public function deleteNews($id){
        news::find($id)->delete();
        return redirect()->back()->with('success', 'Данная статья успешно удалена');
    }


}
