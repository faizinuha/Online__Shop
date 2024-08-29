<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;
class DashboardController extends Controller
{
    //
    public function dashboard(){
        $perpus = Post::all();
        return view('home',compact('perpus'));
    }
}
