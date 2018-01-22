<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointProductRequest;
use App\Http\Requests\PointRequest;
use App\Models\Area;
use App\Models\Point;
use App\Models\PointProduct;
use App\Models\Product;
use App\Models\ProductPointBase;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;

class PointController extends Controller
{
    public function __construct()
    {
        setlocale(LC_MONETARY, 'en_US');
    }

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
        $point = $this->savePoint($request->all());
        $this->saveProductsPoint($point, $request->input('products'));

        return redirect()->route('puntos.index');
    }

    /**
     * @param $data
     * @param $point
     * @return Point
     */
    private function savePoint($data, $point = null)
    {
        $point = ($point) ? $point->fill($data) : new Point($data);
        Area::findOrFail($data['area'])->points()->save($point);

        return $point;
    }

    /**
     * @param $point
     * @param $products
     */
    private function saveProductsPoint($point, $products)
    {
        $productsPoint = ProductPointBase::valueFormat($products);
        $point->products()->sync($productsPoint);
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
        return view('admin.points.edit', [
            'point' => $punto->load('products'),
            'areas' => Area::pluck('name', 'id'),
            'products' => Product::with('points')->get(),
        ]);
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
        $this->savePoint($request->all(), $punto);
        $this->saveProductsPoint($punto, $request->input('products'));

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
        if ($punto->products->isEmpty()) {
            $punto->delete();

            return redirect()->route('puntos.index')->with('deletePoint', true);
        }

        return redirect()->back()->with('cantDelete', true);
    }

    public function pointProductUpdate(PointProductRequest $request)
    {
        $data = $this->dataPointProduct($request->input('products'));
        auth()->user()->assign->productsPoint()->attach($data);

        return back()->with('pointProductUpdate', true);
    }

    private function dataPointProduct($dataPointProducts, $date = false)
    {
        $products = Product::all();
        $date = ($date) ? $date : Carbon::today()->toDateString();
        foreach ($dataPointProducts as $key => $dataPointProduct) {
            $dataPointProducts[$key]['sale_value'] = $products->find($key)->sale_value_format;
            $dataPointProducts[$key]['date'] = $date;
        }

        return $dataPointProducts;
    }

    public function pointDetailToday(Point $point, $date)
    {

        Session()->flash('pointId', $point->id);
        Session()->flash('date', $date);

        return view('admin.points.pointProductDetail', [
            'products' => $point->productsPointDate(session('date'))->get(),
            'point' => $point,
        ]);
    }

    public function pointDetailTodayUpdate(PointProductRequest $request)
    {
        $data = $this->dataPointProduct($request->input('products'), session('date'));
        $point = Point::findOrFail(session('pointId'));
        $point->productsPointDate(session('date'))->sync($data);

        return back()->with('pointProductUpdate', true);
    }

    public function pointDetailDate($date)
    {

        $points = Point::whereHas('pointProduct', function ($q) use ($date) {
            return $q->where('date', $date);
        })->with([
            'pointProduct' => function ($q) use ($date) {
                return $q->where('date', $date);
            },
        ])->get()->each(function ($item) {
            $item->sum = money_format('%n', $item->pointProduct->sum('value_total'));
        });
        session()->flash('date', $date);

        return view('home.home', [
            'points' => $points,
            'today' => $date,
            'pointAll' => Point::count(),
        ]);
    }
}
