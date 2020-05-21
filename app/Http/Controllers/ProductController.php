<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use Illuminate\Http\Request;
use App\ProductCategory;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.product.create', compact('categories'));
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
            'title' => 'required|unique:products,title',
            'category' => 'required',
            'image' => 'required|image|max:2048',
            'link' => 'required',
            'version' => 'required',
            'layout' => 'required',
            'license' => 'required',
            'description' => 'required',
        ]);

        
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() .'_.'. $image->getClientOriginalExtension();
            $image->move(public_path('storage/product/'), $image_new_name);
        }

        $product = Product::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'image' => '/storage/product/' . $image_new_name,
            'price' => $request->price,
            'version' => $request->version,
            'license' => $request->license,
            'layout' => $request->layout,
            'link' => $request->link,
            'download_link' => $request->download_link,
            'description' => $request->description,
            'category_name' => ProductCategory::find($request->category)->name,
        ]);

        Session::flash('success', 'Product Created Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if($product){
            return view('admin.product.show', compact('product'));
        } else {
            return redirect()->route('product.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        if($product){
            return view('admin.product.edit', compact(['product', 'categories']));
        } else {
            return redirect()->route('product.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'title' => "required|unique:products,title,$product->id",
            'category' => 'required',
            'link' => 'required',
            'version' => 'required',
            'layout' => 'required',
            'license' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('image')){
            if(file_exists(public_path($product->image))){
                unlink(public_path($product->image));
            }
            $image = $request->image;
            $image_new_name = time() .'_.'. $image->getClientOriginalExtension();
            $image->move(public_path('storage/product/'), $image_new_name);
            $product->image = '/storage/product/' . $image_new_name;
        }

        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->category_id = $request->category;
        $product->link = $request->link;
        $product->download_link = $request->download_link;
        $product->price = $request->price;
        $product->version = $request->version;
        $product->layout = $request->layout;
        $product->description = $request->description;
        $product->license = $request->license;
        $product->category_name = ProductCategory::find($request->category)->name;
        $product->save();

        Session::flash('success', 'Product Updated Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy(Product $product)
    {
        if(file_exists(public_path($product->image))){
            unlink(public_path($product->image));
        }
        if($product){
            $product->delete();
            Session::flash('success', 'Product Deleted Successfully');
        }

        return redirect()->back();
    }
}
