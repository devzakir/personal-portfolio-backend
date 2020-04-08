<?php

namespace App\Http\Controllers;

use Session;
use App\Course;
use App\CourseSection;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = CourseSection::all();

        return view('admin.course-section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.course-section.create', compact('courses'));
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
            'course' => 'required',
            'name' => 'required',
        ]);

        $section = CourseSection::create([
            'course_id' => $request->course,
            'name' => $request->name,
        ]);

        Session::flash('success', 'Course section created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function show(CourseSection $courseSection)
    {
        $courses = Course::all();
        $section = $courseSection;
        return view('admin.course-section.show', compact(['courses', 'section']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseSection $courseSection)
    {
        $courses = Course::all();
        $section = $courseSection;
        return view('admin.course-section.edit', compact(['courses', 'section']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseSection $courseSection)
    {
        $this->validate($request, [
            'course' => 'required',
            'name' => 'required',
        ]);
        
        $section = $courseSection;
        $section->course_id = $request->course;
        $section->name = $request->name;

        Session::flash('success', 'Course section updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseSection $courseSection)
    {
        
    }
}
