<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function create()
    {
        return view('videoDownload');
    }

    public function forVideo(VideoRequest $request)
    {

        $video = new Video();
        $video->title = $request['title'];
        $video->description = $request['description'];
        $video->video_url = $request['video_url'];
        $video->category_id = $request['category_id'];
        $video->save();

        return redirect()->back()->with('success', 'Данные успешно добавлены!');
    }

    public function video()
    {
        $video = DB::table('videos')->orderBy('id', 'desc')->paginate(4);
        return view('video', ['videos'=>$video]);
    }
}
