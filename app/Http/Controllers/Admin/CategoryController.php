<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Category::all();

        $items = Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.category.index', ['items'=>$items]);
        // return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'categoryName' => 'required|max:35|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->categoryName;
        $category->slug = Str::of($category->name)->slug('-');
        $category->save();

        Session::flash('success', 'Category Added Successfully');
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return "Show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'categoryName' => "required|max:35|unique:categories,name, $category->name",
        ]);
        
        $category = Category::find($request->categoryId);
        $category->name = $request->categoryName;
        $category->slug = Str::of($category->name)->slug('-');
        $category->save();

        Session::flash('success', 'Category Updated Successfully');
        return redirect(route('category.index'));

        // return dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();

        Session::flash('success', 'Category Deleted Successfully');

        return redirect(route('category.index'));
    }
}
