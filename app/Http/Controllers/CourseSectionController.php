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
    public function index($id)
    {
        $course = Course::find($id);
        if($course){
            $sections =  $course->sections;

            return view('admin.course-section.index', compact(['sections', 'course']));
        }else {
            return redirect()->route('course.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $course = Course::find($id);

        if($course){
            return view('admin.course-section.create', compact('course'));
        }else {
            return redirect()->route('course.section.index', ['id' => $course->id]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $section = CourseSection::create([
            'course_id' => $id,
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
    public function edit($id, $sectionId)
    {
        $course = Course::find($id);

        if($course){
            $courses = Course::all();
            $section = CourseSection::find($sectionId);
            if($section){
                return view('admin.course-section.edit', compact(['courses', 'section']));
            }else {
                return redirect()->route('course.section.index', ['id' => $course->id]);
            }
        }else {
            return redirect()->route('course.section.index', ['id' => $course->id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $sectionId)
    {
        $this->validate($request, [
            'course' => 'required',
            'name' => 'required',
        ]);
        
        $section = CourseSection::find($sectionId);
        $section->course_id = $request->course;
        $section->name = $request->name;
        $section->save();

        Session::flash('success', 'Course section updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $sectionId)
    {
        $section = CourseSection::find($sectionId);

        if($section){
            $section->delete();
            Session::flash('success', 'Course Deleted Successfully');
        }
        return redirect()->back();
    }
}
