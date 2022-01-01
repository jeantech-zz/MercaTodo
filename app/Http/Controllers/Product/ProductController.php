<?php

namespace App\Http\Controllers\Product;

use App\Actions\Product\CreateActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Requests\Product\CreateRequest;
use App\Models\Product;
use App\ViewModels\Products\ProductCreateViewModel;
use App\ViewModels\Products\ProductIndexViewModel;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
     /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(IndexRequest $request, ProductIndexViewModel $viewModel): View
    {
        $products = Product::filter($request->input('filters', []))->paginate();
        $viewModel->collection($products);

        return view('products.index', $viewModel->toArray());
    }

    public function create(ProductCreateViewModel $viewModel): View
    {
        return view('layouts.create', $viewModel);
    }


    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $product = CreateActions::execute($request->validated());

      return redirect()->route('products.index')->with('success', 'User created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
