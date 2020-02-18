<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index(Post $post)
    {
        $category_widget = Category::all();

        $data = $post->latest()->take(8)->get();
        return view('blog', compact('data', 'category_widget'));
    }

    // membuat Url dengan slug sesuai Judul post
    public function isi_blog($slug)
    {
        $category_widget = Category::all();

        $data = Post::where('slug', $slug)->get();
        return view('blog.isi_post', compact('data', 'category_widget'));
    }

    public function list_blog()
    {
        $category_widget = Category::all();

        $data = Post::latest()->paginate(6);
        return view('blog.list_post', compact('data', 'category_widget'));
    }

    public function list_category(Category $category)
    {
        $category_widget = Category::all();

        $data = $category->post()->paginate();
        return view('blog.list_post', compact('data', 'category_widget'));
    }
}
