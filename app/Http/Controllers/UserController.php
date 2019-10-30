<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Session;
use App\User;
use App\Profile;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = UserRole::all();
        return view('admin.user.create')->with('roles', $roles);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'min:8|required',
            'avatar' => 'required|image|max:2048'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        $profile = Profile::create([
            'user_id' => $user->id,
            'role_id' => 2,
        ]);

        if($request->hasFile('avatar')){
            $image = $request->avatar;
            $image_new_name = time() . $image->getClientOriginalName();
            $image_new_name = str_replace(" ", "_", $image_new_name);
            $image->move('storage/uploads/user/', $image_new_name);
            
            $img = Image::make(public_path('storage/uploads/user/'. $image_new_name));
            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->crop(200,200,0,0)->save();

            $profile->avatar = 'storage/uploads/user/'. $image_new_name;
            $profile->save();
        }
        
        Session::flash('success', 'User Profile Created Successfully');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = UserRole::all();
        return view('admin.user.edit')->with('user', $user)->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => "required|unique:users,email,$id",
            'avatar' => 'sometimes|image',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasFile('avatar')){
            $old_image = $user->profile->avatar;
            $image = $request->avatar;
            $image_new_name = time() . $image->getClientOriginalName();
            $image_new_name = str_replace(" ", "_", $image_new_name);
            $image->move('storage/uploads/user/', $image_new_name);
            
            $img = Image::make(public_path('storage/uploads/user/'. $image_new_name));
            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            if($img->height() > 200){
                $img->crop(200,200,0,0)->save();
            }else {
                $img->save();
            }
            
            if(file_exists(public_path($old_image))){
                unlink(public_path($old_image));
            }

            $user->profile->avatar = 'storage/uploads/user/'. $image_new_name;
            $user->profile->save();
        }
        // $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', 'User Updated Successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            Session::flash('success', 'User Deleted Successfully');
        }
        return redirect()->back();
    }

    public function profile(){
        $user = Auth::user();
        return view('admin.user.show', ['user' => $user]);
    }

    public function edit_profile(){
        $user = Auth::user();
        // return $user->profile->phone_number;
        return view('admin.user.profile')->with('user', $user);
    }

    public function update_profile(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required', 
            'email' => 'required',
            'avatar' => 'sometimes|image|max:2048',
        ]);
        
        $user = Auth::user();

        if($request->has('name')){
            $user->name = $request->name;
        }

        if($request->has('password')){
            $user->password = $request->password;
        }

        if($request->has('phone_number')){
            $user->profile->phone_number = $request->phone_number;
        }

        if($request->hasFile('avatar')){
            $old_image = $user->profile->avatar;
            $image = $request->avatar;
            $image_new_name = time() . $image->getClientOriginalName();
            $image_new_name = str_replace(" ", "_", $image_new_name);
            $image->move('storage/uploads/user/', $image_new_name);
            
            $img = Image::make(public_path('storage/uploads/user/'. $image_new_name));
            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            
            if($img->height() > 200){
                $img->crop(200,200,0,0)->save();
            }else {
                $img->save();
            }
            
            if($old_image){
                if(file_exists(public_path($old_image))){
                    unlink(public_path($old_image));
                }
            }

            $user->profile->avatar = 'storage/uploads/user/'. $image_new_name;
        }

        $user->profile->save();
        $user->save();

        Session::flash('success', 'Profile Updated Successfully');
        return redirect()->route('profile');
    }
}
