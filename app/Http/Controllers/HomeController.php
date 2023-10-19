<?php

namespace App\Http\Controllers;

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
        return view('home', compact('sliders'));
    }
}
