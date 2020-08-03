<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Contact;
use App\Course;
use App\CourseSection;
use App\Mail\Contact as MailContact;
use App\Order;
use App\Portfolio;
use App\Product;
use App\Setting;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        Mail::to('web.zakirbd@gmail.com')->send(new MailContact($contact));

        return response()->json('success', 200);
    }

    public function products(){
        $products = Product::latest()->paginate(12);

        return response()->json($products, 200);
    }

    public function product_details($slug){
        $product = Product::where('slug', $slug)->first();

        if($product){
            return response()->json($product, 200);
        }else {
            return response()->json('failed', 404);
        }
    }

    public function courses(){
        $courses = Course::with('category')->orderBy('coming_soon', 'asc')->paginate(9);

        return response()->json($courses, 200);
    }

    public function course($slug){
        $course = Course::with('category')->where('slug', $slug)->first();
        $sections = CourseSection::with('videos')->where('course_id', $course->id)->get();
        $course->sections = $sections;

        if($course){
            return response()->json($course, 200);
        }else {
            return response()->json('failed', 404);
        }
    }

    // public function store_billing(Request $request){
    //     $this->validate($request, [
    //         'name' => 'required|max:255',
    //         'email' => 'required|max:255|email',
    //         'phone' => 'required|max:255',
    //         'address' => 'required|max:255'
    //     ]);

    //     $billing = Billing::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //         'user_id' => auth('api')->user()->id,
    //     ]);

    //     return response()->json($billing, 200);
    // }

    public function purchase(Request $request){
        $this->validate($request, [
            'course_id' => 'required',
        ]);

        $user = auth('api')->user();
        $course = Course::find($request->course_id);
        if($course){
            $price = $course->sale_price || $course->price;

            $order = Order::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'amount' => $price,
                'payment_method' => 'bkash',
                'payment_status' => 4,
                'course_id' => $course->id,
                'user_id' => $user->id,
            ]);

            return response()->json($order, 200);
        }else {
            return response()->json('failed', 404);
        }
    }
}
