<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;


class TagController extends Controller
{
    //Checking here if user is logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Tag::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tag.index', ['items'=>$items]);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'tagName' => "required|max:35|unique:tags,name, $tag->name",
        ]);

        $tag = new Tag();
        $tag->name = $request->tagName;
        $tag->slug = Str::of($tag->name)->slug('-');
        $tag->save();

        Session::flash('success', 'Tag Added Successfully');

        return redirect(route('tag.create'));
    }

    //Tag Edit
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', ['tag'=>$tag]);
    }


    // Tag Update
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'tagName' => "required|max:35|unique:tags,name, $tag->name",
        ]);
        
        $tag = Tag::find($request->tagId);
        $tag->name = $request->tagName;
        $tag->slug = Str::of($tag->name)->slug('-');
        $tag->save();

        Session::flash('success', 'Tag Updated Successfully');
        return redirect(route('tag.index'));
    }

    public function destroy($id)
    {
        $data = Tag::find($id);
        $data->delete();

        Session::flash('success', 'Tag Deleted Successfully');
        return redirect(route('tag.index'));
    }
}
