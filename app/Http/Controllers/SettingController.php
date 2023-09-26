<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        $user = auth()->user();

        return view('admin.setting.edit', compact('setting','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */





public function update(Request $request)
     {
        // dd($request);
         $pid = $request->id;
         $postToUpdate = Setting::findOrFail($pid);

         $postToUpdate->update([
             'name' => $request->name,
             'site_logo' => 'site_logo',
             'description' => $request->description,
             'facebook' => $request->facebook,
             'twitter' => $request->twitter,
             'instagram' => $request->instagram,
             'reddit' => $request->reddit,
             'email' => $request->email,
             'copyright' => $request->copyright,
             'phone' => $request->phone,
             'address' => $request->address,
         ]);



         if ($request->hasFile('site_logo')) {
             $image = $request->site_logo;
             $image_new_name = time() . '.' . $image->getClientOriginalExtension();
             $image->move('storage/post/', $image_new_name);
             $postToUpdate->site_logo = '/storage/post/' . $image_new_name;
             $postToUpdate->save();
         }

         $notification = [
             'message' => 'Setting updated successfully',
             'alert-type' => 'success'
         ];

         return redirect()->back()->with($notification);
     }














    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
