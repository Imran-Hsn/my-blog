<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();

        $featuredPost = Post::latest()->findOrFail(1);
        $latestPosts = Post::latest()->paginate(6);

        return view('index', (['featuredPost'=>$featuredPost,'categories'=>$categories, 'tags'=>$tags, 'latestPosts'=>$latestPosts]));
    }

    public function readPost($slug) {
        $post = Post::find($slug);
        return view('readpost',(['post'=>$post]));
    }
}
