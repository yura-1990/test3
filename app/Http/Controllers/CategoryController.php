<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Catalog $catalog): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('category.create', compact('catalog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $request->validated();
        Category::query()->create($request->all());
        return redirect()->route('catalog.show',['catalog'=>$request->catalog_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $catalog_id = Catalog::query()->find($category->catalog_id);
        return view('category.show', compact('category', 'catalog_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $request->validated();
        $category->title = $request->title;
        $category->catalog_id = $request->catalog_id;
        $category->save();
        return redirect()->route('catalog.show',['catalog'=>$request->catalog_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return back();
    }
}
