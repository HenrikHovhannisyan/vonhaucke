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
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Factory|View
     */

    public function search(Request $request)
    {
        $info = Info::all();
        $search = $request->input('search');

        $products = Product::query()
            ->where('name', 'like', "%$search%")
            ->get();

        return view('search', ['products' => $products], compact('info'));
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

    public function showCategory(Category $category)
    {
        $info = Info::all();
        $products = Product::where('category_id', '=', $category->id)->get();
        return view('category-show', compact('info', 'category', 'products'));
    }
}
