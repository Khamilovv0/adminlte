<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\VideoRequest;
use App\Models\Video;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }
    public function oneUser($id){
        $user = new User;
        return view ('users.oneUser', ['data'=>$user->find($id)]);
    }

}
