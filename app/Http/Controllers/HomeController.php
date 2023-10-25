<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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
        $info = Info::all();
        $products = Product::inRandomOrder()->take(3)->get();
        return view('home', compact('sliders', 'partners', 'info', 'products'));
    }
}
