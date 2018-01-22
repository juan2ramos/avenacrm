<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        setlocale(LC_TIME, 'es_ES');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminHome()
    {
        $pc = new PointController();
        return $pc->pointDetailDate(Carbon::now()->toDateString());

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $route = auth()->user()->hasRole('Admin') ? 'dashboard' : 'homePoint';

        return redirect()->route($route);
    }

    public function homePoint()
    {
        $products = auth()->user()->assign->stockDay;
        session()->flash('date',Carbon::now()->toDateString());
        if (! $products->isEmpty()) {
            return view('home.point', [
                'products' => $products,
                'productsAvailable' => auth()->user()->assign->productsAvailable,
                'day' => 'hoy',
                'date' => Carbon::now()->formatLocalized('%A %d de %B %Y'),

            ]);
        }

        return view('home.point', [
            'products' => auth()->user()->assign->stockYesterday,
            'productsAvailable' => auth()->user()->assign->productsAvailable,
            'day' => 'ayer',
            'date' => Carbon::yesterday()->formatLocalized('%A %d de %B %Y'),
            'today' => Carbon::today()->formatLocalized('%A %d de %B %Y'),
        ]);
    }
}
