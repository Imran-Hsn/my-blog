<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::orderby('created_at', 'desc')->paginate(10);
        return view('admin.post.index', ['data'=>$data]);
    }

// Create Post
    public function create()
    {
        $tags = Tag::all();
        $data = Category::all();
        return view('admin.post.create', ['data'=>$data, 'tags'=>$tags]);
    }

// Store Post
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:posts',
            'description' => 'required',
            'category' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::of($request->title)->slug('-'),
            'description' => $request->description,
            'category_id'=> $request->category,
            'author_id' => 2,
        ]);
        $post->tags()->attach($request->tags);


        if($request->has('image')) 
        {
            $post->image = $request->image;
            $image_new_name = time() . '.' . $request->image->getClientOriginalExtension();
            $post->image->move('storage/post', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            $post->save();
        }

        Session::flash('success', 'Post Created Successfully');
        return redirect()->route('post.index');
    }

    // View/Show Post
    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        return view('admin.post.show', ['post'=>$post]);
    }

    // Edit Post
    public function edit($id) 
    {
        return "Hello From Edit";
    }

}
