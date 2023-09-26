<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UserController extends Controller
{
     public function index(){
        $user = auth()->user();
        $users = User::latest()->paginate(20);

        return view('admin.user.index', compact('users','user'));
    }

    public function create(){
        $user = auth()->user();
        return view('admin.user.create',compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // validation
        $this->validate($request, [
            'name' => 'required|unique:tags,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $tag = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
        ]);
        $notification= array(
            'message' => 'User created successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('user.index')->with($notification);

    }

    public function edit($id)
    {
        $user = auth()->user();
        $user=User::findOrFail($id);
        return view('admin.user.edit', compact('user','user'));
    }
    public function update(Request $request){
        $pid= $request->id;
        // dd($pid);
        User::findOrFail($pid)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
            'description' => $request->description,
      ]);
    $notification= array(
        'message' => 'User Updated successfully',
        'alert-type' => 'success'

    );
    return redirect()->route('user.index')->with($notification);
    }//End Method

    public function destroy($id){
        User::findOrFail($id)->delete();
     $notification= array(
         'message' => 'User Deleted successfully',
         'alert-type' => 'success',
     );
     return redirect()->back()->with($notification);
    }//End Method




    public function profile(){
        $user = auth()->user();
        // dd($user);
        return view('admin.user.profile', compact('user'));
    }

    public function profile_update(Request $request)
{
    $pid = $request->id;
    $userToUpdate = User::findOrFail($pid);
    // dd($request->all());
    $updateData = [
        'name' => $request->name,
        'email' =>$request->email,
        'description' => $request->description ,
    ];
    // dd($updateData);

    if ($request->has('password') && $request->password !== null) {
        $updateData['password'] = bcrypt($request->password);
    }

    $updateResult =  $userToUpdate->update($updateData);
    if ($request->hasFile('image')) {
        $image = $request->image;
        $image_new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('storage/user/', $image_new_name);
        $userToUpdate->image = '/storage/user/' . $image_new_name;
        $userToUpdate->save();
    }

    $notification = [
        'message' => 'User updated successfully',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
}

}
