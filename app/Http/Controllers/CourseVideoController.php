<?php

namespace App\Http\Controllers;

use App\Course;
use Session;
use App\CourseSection;
use App\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $courses = Course::all();

        return view('admin.course-video.create', compact(['sections', 'courses']));
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

        $video = CourseVideo::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'video_time' => $request->video_time,
            'type' => $request->type,
            'video' => $request->video,
            'download_url' => $request->download_url,
            'download_count' => $request->download_count,
            'course_id' => $request->course_id,
            'section_id' => $request->section_id,
        ]);

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
        $courses = Course::all();
        $video = $courseVideo;

        return view('admin.course-video.edit', compact(['video', 'section', 'courses']));
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

        $video = $courseVideo;
        $video->title = $request->title;
        $video->slug = Str::slug($request->title);
        $video->video_time = $request->video_time;
        $video->type = $request->type;
        $video->video = $request->video;
        $video->download_url = $request->download_url;
        $video->download_count = $request->download_count;
        $video->course_id = $request->course_id;
        $video->section_id = $request->section_id;
        $video->save();

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
