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
    public function index($id)
    {
        $section = CourseSection::find($id);
        if($section){
            $videos = CourseVideo::with('course')->where('section_id', $section->id)->latest()->get();

            return view('admin.course-video.index', compact(['videos', 'section']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $section = CourseSection::find($id);

        if($section){
            $sections = CourseSection::where('course_id', $section->course_id)->get();
            $courses = Course::where('id', $section->course_id)->get();

            return view('admin.course-video.create', compact(['sections', 'courses', 'section']));
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
            'course_id' => $request->course,
            'section_id' => $request->section,
        ]);

        if($request->coming_soon == "on"){
            $video->coming_soon = true;
        }else {
            $video->coming_soon = false;
        }
        $video->save();

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
    public function edit($id, $videoId)
    {
        $section = CourseSection::find($id);

        if($section){
            $sections = CourseSection::where('course_id', $section->course_id)->get();
            $courses = Course::where('id', $section->course_id)->get();
            $video = CourseVideo::find($videoId);

            return view('admin.course-video.edit', compact(['video', 'sections', 'courses', 'section']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseVideo  $courseVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $videoId)
    {
        $section = CourseSection::find($id);
        $video = CourseVideo::find($videoId);

        $this->validate($request, [
            'title' => 'required',
        ]);

        $video->title = $request->title;
        $video->slug = Str::slug($request->title);
        $video->video_time = $request->video_time;
        $video->type = $request->type;
        $video->video = $request->video;
        $video->download_url = $request->download_url;
        $video->download_count = $request->download_count;
        $video->course_id = $request->course;
        $video->section_id = $request->section;

        if($request->coming_soon == "on"){
            $video->coming_soon = true;
        }else {
            $video->coming_soon = false;
        }

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
    public function destroy($id, $videoId)
    {
        $video = CourseVideo::find($videoId);
        if($video){
            $video->delete();

            Session::flash('success', 'Course Video deleted');
        }

        return redirect()->back();
    }
}
