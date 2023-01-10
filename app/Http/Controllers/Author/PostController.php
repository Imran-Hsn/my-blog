<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $author_id = Auth::id();
        $data = Post::where('user_id', $author_id)->orderBy('created_at', 'desc')->paginate(10);

        return view('author.post.index', ['data' => $data]);
    }

    // Create Post
    public function create()
    {
        $tags = Tag::all();
        $data = Category::all();
        return view('author.post.create', ['data' => $data, 'tags' => $tags]);
    }

    // Store Post
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:posts',
            'description' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpg,png',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::of($request->title)->slug('-'),
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);
        $post->tags()->attach($request->tags);

        if ($request->has('image')) {
            $post->image = $request->image;
            $image_new_name = time() . '.' . $request->image->getClientOriginalExtension();
            $post->image->move('storage/post', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
        }

        $post->save();

        Session::flash('success', 'Post Created Successfully');
        return redirect()->route('author.post.index');
    }

    // View/Show Post
    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        if (Auth::id() == $post->user_id) {
            return view('author.post.show', ['post' => $post]);
        } else {
            return redirect()->route('author.post.index');
        }
    }

    // Edit Post
    public function edit($id)
    {$post = Post::find($id);
        if (Auth::id() == $post->user_id) {


            $categories = Category::all();
            $tags = Tag::all();
            return view('author.post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
        } else {
            return redirect()->route('author.post.index');
        }
    }

        //Update Post
        public function update(Request $request, Post $post)
        {
            $this->validate($request, [
                'postTitle' => 'required|max:255',
                'postDescription' => 'required',
                'postCategory' => 'required',
                'postTags' => 'required',
                'image' => 'image|mimes:jpg,png',
            ]);
    
            $post = Post::find($request->postId);
            $post->title = $request->postTitle;
            $post->slug = Str::of($request->postTitle)->slug('-');
            $post->description = $request->postDescription;
            $post->category_id = $request->postCategory;
            $post->user_id = Auth::user()->id;
    
            $post->tags()->sync($request->postTags);
    
            if ($request->has('postImage')) {
                $post->image = $request->postImage;
                $image_new_name = time() . '.' . $request->postImage->getClientOriginalExtension();
                $post->image->move('storage/post', $image_new_name);
                $post->image = '/storage/post/' . $image_new_name;
            }
    
            $post->save();
    
            Session::flash('success', 'Post Updated Successfully');
            return redirect(route('author.post.index'));
        }

        public function destroy(Post $post, $id)
        {
    
            $post = Post::find($id);
    
            if($post) {
                if(file_exists(public_path($post->image))){
                    unlink(public_path($post->image));
                }
            }
            
            $delete_post = Post::where('id', $id)->delete();
    
            Session::flash('success', 'Post Deleted Successfully');
            return redirect(route('author.post.index'));
        }
}
