<?php

namespace App\Http\Controllers;

use Session;
use App\PortfolioCategory;
use Illuminate\Http\Request;

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
        return view('admin.portfolio-category.index', ['categories' => $categories]);
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
            'name' => 'required',
        ]);

        $category = PortfolioCategory::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
        ]);

        Session::flash('success', 'Portfolio Category Created Successfully');
        return redirect()->route('portfolio.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioCategory $portfolioCategory, $id)
    {
        $category = PortfolioCategory::find($id);
        return view('admin.portfolio-category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioCategory $portfolioCategory, $id)
    {
        $category = PortfolioCategory::find($id);
        return view('admin.portfolio-category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioCategory $portfolioCategory, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = PortfolioCategory::find($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        Session::flash('success', 'Portfolio Category Created Successfully');
        return redirect()->route('portfolio.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioCategory $portfolioCategory, $id)
    {
        $category = PortfolioCategory::find($id);
        $category->delete();

        Session::flash('success', 'Portfolio Category Deleted Successfully');
        return redirect()->back();
    }
}
