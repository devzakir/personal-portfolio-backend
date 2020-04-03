<?php

namespace App\Http\Controllers;

use Session;
use App\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PortfolioCategory::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.portfolio-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio-category.create');
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
            'name' => 'required|unique:portfolio_categories,name',
        ]);

        $category = PortfolioCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        Session::flash('success', 'Portfolio category created successfully');
        return redirect()->route('portfolio-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioCategory $portfolioCategory)
    {
        return view('admin.portfolio-category.show', ['category' => $portfolioCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('admin.portfolio-category.edit', ['category' => $portfolioCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $this->validate($request, [
            'name' => "required|unique:portfolio_categories,name, $portfolioCategory->id",
        ]);

        $category = $portfolioCategory;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        Session::flash('success', 'Portfolio category created successfully');
        return redirect()->route('portfolio-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioCategory $portfolioCategory)
    {
        if($portfolioCategory){
            $portfolioCategory->delete();   
            Session::flash('success', 'Portfolio category deleted successfully');
        }
        return redirect()->back();
    }
}
