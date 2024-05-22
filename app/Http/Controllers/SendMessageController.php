<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{

    public function send($id){
        $news= new news();
        return view('sendMessage',['data'=>$news->find($id)]);
    }
}
