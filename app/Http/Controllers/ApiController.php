<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Setting;
use App\Testimonial;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function setting(){
        $setting = Setting::first();

        return response()->json($setting, 200);
    }

    public function portfolio(){
        $data = Portfolio::where('status', true)->paginate(6);

        return response()->json($data, 200);
    }

    public function testimonial(){
        $data = Testimonial::latest()->take(3)->get();

        return response()->json($data, 200);
    }
}
