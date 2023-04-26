<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $catalogs = Catalog::query()->get();

        return view('catalog.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatalogRequest $request): RedirectResponse
    {
        $request->validated();
        Catalog::query()->create($request->all());
        return redirect()->route('catalog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
//        dd($catalog->category[0]->products[0]->title);
        return view('catalog.show', compact('catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('catalog.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogRequest $request, Catalog $catalog): RedirectResponse
    {
        $request->validated();
        $catalog->title = $request->title;
        $catalog->save();
        return redirect()->route('catalog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog): RedirectResponse
    {
        $catalog->delete();
        return back();
    }
}
