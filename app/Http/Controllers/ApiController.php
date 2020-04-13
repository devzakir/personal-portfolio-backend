<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Portfolio;
use App\Product;
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
        $data = Portfolio::latest()->where('status', true)->paginate(6);

        return response()->json($data, 200);
    }

    public function testimonial(){
        $data = Testimonial::latest()->take(3)->get();

        return response()->json($data, 200);
    }

    public function contact(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email', 
            'subject' => 'required|string', 
            'message' => 'required|min:20',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json('success', 200);
    }

    public function products(){
        $products = Product::latest()->paginate(12);

        return response()->json($products, 200);
    }
}
