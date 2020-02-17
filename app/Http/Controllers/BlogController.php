<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index(Post $post)
    {
        $data = $post->orderBy('created_at', 'desc')->get();
        return view('blog', compact('data'));
    }

    // membuat Url dengan slug sesuai Judul post
    public function isi_blog($slug)
    {
        $data = Post::where('slug', $slug)->get();
        return view('blog.isi_post', compact('data'));
    }
}
