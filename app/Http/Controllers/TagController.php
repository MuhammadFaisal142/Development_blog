<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $user = auth()->user();
        $tags = Tag::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.tag.index', compact('tags','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $user = auth()->user();
        return view('admin.tag.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        // dd($request->all());
        // validation
        $this->validate($request, [
            'name' => 'required|unique:tags,name',
        ]);

        $tag = Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
        ]);
        $notification= array(
            'message' => 'Tag created successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('tag.index')->with($notification);

    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $tag=Tag::findOrFail($id);
        return view('admin.tag.edit', compact('tag','user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */


 public function update(Request $request){
        $pid= $request->id;
        // dd($pid);
        Tag::findOrFail($pid)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
      ]);
    $notification= array(
        'message' => 'Tag Updated successfully',
        'alert-type' => 'success'

    );
    return redirect()->route('tag.index')->with($notification);
    }//End Method







    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Tag::findOrFail($id)->delete();
     $notification= array(
         'message' => 'Tag Deleted successfully',
         'alert-type' => 'success',
     );
     return redirect()->back()->with($notification);
    }//End Method

}



