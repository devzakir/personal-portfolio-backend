<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Portfolio;
use App\PortfolioCategory;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.portfolio.index', ['portfolios' => $portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
            'image' => 'required|image|max:2048',
            'category_id' => 'required',
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() .'_'. $image->getClientOriginalName();
            $image->move(public_path('storage/portfolio/'), $image_new_name);
        }

        $portfolio = Portfolio::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'link' => $request->link,
            'description' => $request->description,
            'image' => '/storage/portfolio/' . $image_new_name,
            'category_name' => PortfolioCategory::find($request->category_id)->name,
        ]);

        Session::flash('success', 'Portfolio Created Successfully');
        return redirect()->route('portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', ['portfolio' => $portfolio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {      
        $categories = PortfolioCategory::all();
        return view('admin.portfolio.edit', ['portfolio' => $portfolio, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
            'image' => 'sometimes|image|max:2048',
            'category_id' => 'required',
        ]);

        $portfolio->title = $request->title;
        $portfolio->category_id = $request->category_id;
        $portfolio->link = $request->link;
        $portfolio->description = $request->description;
        $portfolio->slug = Str::slug($request->name);
        $portfolio->category_name = PortfolioCategory::find($request->category_id)->name;


        if($request->hasFile('image')){
            if(file_exists(public_path($portfolio->image))){
                unlink(public_path($portfolio->image));
            }

            $image = $request->image;
            $image_new_name = time() .'_'. $image->getClientOriginalName();
            $image->move(public_path('storage/portfolio/'), $image_new_name);
            $portfolio->image = '/storage/portfolio/' . $image_new_name;
        }
        $portfolio->save();


        Session::flash('success', 'Portfolio Updated Successfully');
        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if(file_exists($portfolio->image)){
            unlink($portfolio->image);
        }
        $portfolio->delete();

        Session::flash('success', 'Portfolio Deleted Successfully');
        return redirect()->back();
    }

    public function get_data(){
        $portfolios = Portfolio::latest()->paginate(9);

        return response()->json($portfolios, 200);
    }
}
