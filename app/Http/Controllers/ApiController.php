<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function setting(){
        $setting = Setting::first();

        return response()->json($setting, 200);
    }
}
