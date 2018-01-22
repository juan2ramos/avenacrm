<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest|Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->all());

        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Product $producto)
    {
        return redirect()->route('productos.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $producto)
    {
        return view('admin.products.edit', ['product' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ProductRequest $request
     * @param \App\Models\Product $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $producto)
    {
        $producto->fill($request->validated())->save();

        return redirect()->back()->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('deleteProduct', true);
    }
}
