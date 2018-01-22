<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryRequest;
use App\Models\Inventory;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param bool $date
     * @return \Illuminate\Http\Response
     */
    public function index($date = false)
    {
        $index = $date ? 0 : 1;
        $date = ($date) ? $date : Carbon::now()->toDateString();
        $inventories = Inventory::with('product')->where('date', $date)->get();
        $products = Product::all();

        return view('admin.inventory.index', compact('inventories', 'products', 'date', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Http\Requests\InventoryRequest $request
     * @return void
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\InventoryRequest $request
     * @return Inventory
     */
    public function store(InventoryRequest $request)
    {
        Inventory::insert($request->input('products'));

        return redirect()->back()->with('insert', 1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\InventoryRequest $request
     * @param  \App\Models\Inventory $inventory
     * @return void
     */
    public function update(InventoryRequest $request, Inventory $inventory)
    {
        dd($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }

    public function updateMany(InventoryRequest $request, $date)
    {
        Inventory::where('date', '=', $date)->delete();
        Inventory::insert($request->input('products'));

        return redirect()->back()->with('update', 1);
    }
}
