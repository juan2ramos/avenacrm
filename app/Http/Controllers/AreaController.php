<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.areas.index', ['areas' => Area::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        Area::create($request->all());
        return redirect()->route('zonas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return redirect()->route('zonas.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area $zona
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $zona)
    {
        return view('admin.areas.edit', ['area' => $zona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AreaRequest|\Illuminate\Http\Request $request
     * @param  \App\Models\Area $zona
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, Area $zona)
    {
        $zona->fill($request->all())->save();
        return redirect()->back()->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Area $zona
     * @return \Illuminate\Http\Response
     * @internal param Area $area
     */
    public function destroy(Area $zona)
    {
        if ($zona->points->isEmpty()) {
            $zona->delete();
            return redirect()->route('zonas.index')->with('deleteArea', true);
        }
        return redirect()->back()->with('cantDelete', true);

    }
}
