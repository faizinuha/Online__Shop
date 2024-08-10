<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get posts
        $posts = Post::latest()->paginate(5);
    
        // Render view with posts
        return view('posts.index', compact('posts'));
    }
    
}
