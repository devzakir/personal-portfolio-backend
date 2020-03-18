<?php

namespace App\Http\Controllers;

use App\Setting;
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
        $settings = Setting::all();
        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $setting = Setting::find(1);
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        dd($request->all());
        $this->validate($request, [
            'name' => 'required',
        ]);

        $setting->name = $request->name;
        $setting->navbar = $request->navbar;
        $setting->copyright = $request->copyright;
        $setting->save();

        // Upload Image and Resize
        if($request->hasFile('avatar')){
            $old_image = $setting->logo;

            $image = $request->logo;
            $image_new_name = time() .'.'. $image->getClientOriginalExtension();
            $image->move('storage/setting/', $image_new_name);
            $setting->logo = 'storage/setting/'. $image_new_name;
            $setting->save();

            if($old_image){
                if(file_exists($old_image)){
                    unlink($old_image);
                }
            }
        }

        Session::flash('success', 'Setting updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
