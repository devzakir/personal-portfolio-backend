<?php

namespace App\Http\Controllers;

use Session;
use App\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CourseCategory::latest()->paginate(20);
        return view('admin.course-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course-category.create');
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
            'name' => 'required|unique:course_categories,name',
        ]);

        $category = CourseCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        Session::flash('success', 'Course category created successfully');
        return redirect()->route('course-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CourseCategory $courseCategory)
    {
        return view('admin.course-category.show', ['category' => $courseCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseCategory $courseCategory)
    {
        return view('admin.course-category.edit', ['category' => $courseCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseCategory $courseCategory)
    {
        $this->validate($request, [
            'name' => "required|unique:course_categories,name, $courseCategory->id",
        ]);

        $category = $courseCategory;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        Session::flash('success', 'Course category created successfully');
        return redirect()->route('course-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseCategory $courseCategory)
    {
        if($courseCategory){
            $courseCategory->delete();   
            Session::flash('success', 'Course category deleted successfully');
        }
        return redirect()->back();
    }
}
