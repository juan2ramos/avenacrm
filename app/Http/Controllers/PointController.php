<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointRequest;
use App\Models\Area;
use App\Models\Point;
use App\Models\Product;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.points.index', ['points' => Point::all()->load('area')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.points.create', [
            'areas' => Area::pluck('name', 'id'),
            'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\PointRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointRequest $request)
    {
        $area = Area::findOrFail($request->input('area'));
        $area->points()->save(new Point($request->all()));

        return redirect()->route('puntos.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect()->route('puntos.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point $punto
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Point $punto)
    {
        return view('admin.points.edit', ['point' => $punto, 'areas' => Area::pluck('name', 'id')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PointRequest|\Illuminate\Http\Request $request
     * @param Point $punto
     * @return \Illuminate\Http\Response
     * @internal param Point $point
     */
    public function update(PointRequest $request, Point $punto)
    {
        $area = Area::findOrFail($request->input('area'));
        $area->points()->save($punto->fill($request->validated()));

        return redirect()->back()->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Point $punto
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Point $punto)
    {
        $punto->delete();

        return redirect()->route('puntos.index')->with('deletePoint', true);
    }
}
