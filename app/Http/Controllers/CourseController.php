<?php

namespace App\Http\Controllers;

use Session;
use App\Course;
use App\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(20);
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CourseCategory::all();
        return view('admin.course.create', compact('categories'));
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
            'title' => 'required|unique:courses,title',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required|image|max:2048',
            'description' => 'required',
            'short_description' => 'required',
            'duration' => 'required',
            'videos' => 'required',
            'projects' => 'required',
            'level' => 'required',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'image' => 'image',
            'video' => $request->video,
            'description' => $request->description,
            'highlight' => $request->highlight,
            'short_description' => $request->short_description,
            'duration' => $request->duration,
            'videos' => $request->videos,
            'projects' => $request->projects,
            'level' => $request->level,
        ]);

        if($request->coming_soon == "on"){
            $course->coming_soon = true;
        }else {
            $course->coming_soon = false;
        }

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() .'_.'. $image->getClientOriginalExtension();
            $image->move(public_path('storage/portfolio/'), $image_new_name);
            $course->image = '/storage/portfolio/' . $image_new_name;
        }
        $course->save();

        if($course){
            Session::flash('succcess', 'Course created successfully');
        }
        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = CourseCategory::all();
        return view('admin.course.edit', compact(['categories', 'course']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'title' => "required|unique:courses,title,$course->id",
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->category_id = $request->category;
        $course->user_id = auth()->user()->id;
        $course->price = $request->price;
        $course->sale_price = $request->sale_price;
        $course->video = $request->video;
        $course->highlight = $request->highlight;
        $course->description = $request->description;
        $course->short_description = $request->short_description;
        $course->duration = $request->duration;
        $course->videos = $request->videos;
        $course->projects = $request->projects;
        $course->level = $request->level;

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() .'_.'. $image->getClientOriginalExtension();
            $image->move(public_path('storage/portfolio/'), $image_new_name);
            $course->image = '/storage/portfolio/' . $image_new_name;
        }

        if($request->coming_soon == "on"){
            $course->coming_soon = true;
        }else {
            $course->coming_soon = false;
        }

        $course->save();

        if($course){
            Session::flash('succcess', 'Course updated successfully');
        }
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if($course){
            if(file_exists(public_path($course->image))){
                unlink(public_path($course->image));
            }

            $course->delete();
            Session::flash('success', 'Course deleted successfully');
        }
        return redirect()->back();
    }
}
