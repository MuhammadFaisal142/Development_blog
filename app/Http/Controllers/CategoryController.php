<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        // dd($user);
        $categories = Category::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.category.index', compact(['categories','user']));
    }//End Method


    public function create_category()
    {
        $user = auth()->user();
        return view('admin.category.create',compact('user'));
    }//End Method


    public function edit_category($id)
    {
        $user = auth()->user();
        $category=Category::findOrFail($id);
        return view('admin.category.edit', compact('category','user'));
    }//End Method

    public function show_category($id)
    {   $user = auth()->user();
        $category=Category::findOrFail($id);
        return view('admin.category.show_category', compact('category','user'));
    }//End Method

    public function store_category(Request $request)
    {
        // dd($request->all());
        // validation
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
        ]);
        $notification= array(
            'message' => 'Category created successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('category.index')->with($notification);

    }
    public function update_category(Request $request){
        $pid= $request->id;
        // dd($pid);
        Category::findOrFail($pid)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
      ]);
    $notification= array(
        'message' => 'Category Updated successfully',
        'alert-type' => 'success'

    );
    return redirect()->route('category.index')->with($notification);
    }//End Method


    public function Delete_category($id){
        Category::findOrFail($id)->delete();
     $notification= array(
         'message' => 'Category Deleted successfully',
         'alert-type' => 'success',
     );
     return redirect()->back()->with($notification);
    }//End Method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
