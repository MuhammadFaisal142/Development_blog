<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        // dd($posts);
        return view('admin.post.index', compact(['posts','user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $tags = Tag::all();
        $categories = Category::all();
        // dd($tags);
        return view('admin.post.create', compact(['categories', 'tags','user']));
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
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);

        $post->tags()->attach($request->tags);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            $post->save();
        }


        $notification= array(
            'message' => 'Post created successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('post.index')->with($notification);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $post=Post::findOrFail($id);

        return view('admin.post.show', compact('post','user'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $post=Post::findOrFail($id);
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact(['post', 'categories', 'tags','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, Post $post)
     {
         $pid = $request->id;
         $postToUpdate = Post::findOrFail($pid);

         $postToUpdate->update([
             'title' => $request->title,
             'slug' => Str::slug($request->title, '-'),
             'description' => $request->description,
             'category_id' => $request->category,
         ]);

         $postToUpdate->tags()->sync($request->tags);

         if ($request->hasFile('image')) {
             $image = $request->image;
             $image_new_name = time() . '.' . $image->getClientOriginalExtension();
             $image->move('storage/post/', $image_new_name);
             $postToUpdate->image = '/storage/post/' . $image_new_name;
             $postToUpdate->save();
         }

         $notification = [
             'message' => 'Post updated successfully',
             'alert-type' => 'success'
         ];

         return redirect()->route('post.index')->with($notification);
     }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){

        Post::findOrFail($id)->delete();
     $notification= array(
         'message' => 'Post Deleted successfully',
         'alert-type' => 'success',
     );
     return redirect()->back()->with($notification);
    }//End Method
}
