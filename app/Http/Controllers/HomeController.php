<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Slider;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $partners = Partner::all()->reverse()->take(4);
        return view('home', compact('sliders', 'partners'));
    }
}
