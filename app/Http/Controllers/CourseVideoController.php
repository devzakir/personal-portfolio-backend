<?php

namespace App\Http\Controllers;

use App\CourseSection;
use App\CourseVideo;
use Illuminate\Http\Request;

class CourseVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = CourseVideo::latest()->paginate(30);

        return view('admin.course-video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = CourseSection::all();
        return view('admin.course-video.create', compact('sections'));
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
            'title' => 'required',
        ]);

        $video = CourseVideo::create($request->all());

        Session::flash('success', 'Course Video created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseVideo  $courseVideo
     * @return \Illuminate\Http\Response
     */
    public function show(CourseVideo $courseVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseVideo  $courseVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseVideo $courseVideo)
    {
        $section = CourseSection::all();
        return view('admin.course-video.edit', compact(['video', 'section']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseVideo  $courseVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseVideo $courseVideo)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $video = CourseVideo::update($request->all());

        Session::flash('success', 'Course Video updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseVideo  $courseVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseVideo $courseVideo)
    {
        $video = $courseVideo;

        if($video){
            $video->delete();

            Session::flash('success', 'Course Video deleted');
        }

        return redirect()->back();
    }
}
