<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return redirect()->route('dashboard');
    }

    public function dashboard(){
        return view('admin.dashboard.welcome');
    }

    public function analytics(){
        return view('admin.dashboard.index');
    }
}
