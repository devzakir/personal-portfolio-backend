<?php

namespace App\Http\Controllers;

use Session;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.testimonial.index', compact('testimonials')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'avatar' => 'required|image|max:2048',
        ]);

        $testimonial = Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
            'avatar' => '/storage/testimonial',
        ]);

        if($request->hasFile('avatar')){
            $image = $request->avatar;
            $image_new_name = time() . '_.' . $image->getClientOriginalExtension();
            $image->move(public_path('/storage/testimonial/'), $image_new_name);
            $testimonial->avatar = '/storage/testimonial/' . $image_new_name;
            $testimonial->save();
        }

        
        Session::flash('success', 'Testimonial created successfully');
        return redirect()->route('testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'avatar' => 'sometimes|image|max:2048',
        ]);

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;

        if($request->hasFile('avatar')){
            $image = $request->avatar;
            $image_new_name = time() . '_.' . $image->getClientOriginalExtension();
            $image->move(public_path('/storage/testimonial/'), $image_new_name);
            $testimonial->avatar = '/storage/testimonial/' . $image_new_name;
        }
        $testimonial->save();
        
        Session::flash('success', 'Testimonial updated successfully');
        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if($testimonial){
            if(file_exists(public_path($testimonial->avatar))){
                unlink(public_path($testimonial->avatar));
            }
            $testimonial->delete();
        }

        Session::flash('success', 'Testimonial deleted successfully');
        return redirect()->route('testimonial.index');
    }

    public function get_data(){
        return response()->json(Testimonial::orderBy('created_at', 'desc')->take(3)->get(), 200);
    }
}