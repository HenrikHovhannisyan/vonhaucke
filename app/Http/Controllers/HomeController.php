<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::all()->reverse()->take(4);
        return view('home', compact('sliders', 'partners', 'info', 'products', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Factory|View
     */
    public function show(Product $product)
    {
        $info = Info::all();
        $products = Product::inRandomOrder()->take(3)->get();
        $text = Product::select('characteristics')->first();
        $lines = explode("\n", $text->characteristics);

        return view('product-show', compact('info','product', 'products', 'lines'));
    }
}
