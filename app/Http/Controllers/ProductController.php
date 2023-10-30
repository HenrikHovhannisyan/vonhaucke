<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('admin.products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'about' => 'required',
            'characteristics' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf' => 'file|mimes:pdf|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $input = $request->all();

        if ($request->hasFile('images')) {
            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $destinationPath = 'img/products/';
                $profileImage = date('YmdHis') . '_' . Str::random(5) . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $imagePaths[] = $destinationPath . $profileImage;
            }

            $input['images'] = json_encode($imagePaths);
        }

        if ($pdfFile = $request->file('pdf')) {
            $destinationPath = 'pdf/products';
            $pdfFileName = date('YmdHis') . "." . $pdfFile->getClientOriginalExtension();
            $pdfFile->move($destinationPath, $pdfFileName);
            $input['pdf'] = $destinationPath . '/' . $pdfFileName;
        }

        $input['category_id'] = $request->category_id;

        Product::create($input);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Factory|View
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Factory|View
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'about' => 'required',
            'characteristics' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf' => 'file|mimes:pdf|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $input = $request->all();

        if ($pdfFile = $request->file('pdf')) {
            $destinationPath = 'pdf/products';

            if ($product->pdf) {
                $oldPdfPath = public_path($product->pdf);
                if (file_exists($oldPdfPath)) {
                    unlink($oldPdfPath);
                }
            }

            $pdfFileName = date('YmdHis') . "." . $pdfFile->getClientOriginalExtension();
            $pdfFile->move($destinationPath, $pdfFileName);
            $input['pdf'] = $destinationPath . '/' . $pdfFileName;
        }

        if ($request->hasFile('images')) {
            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $destinationPath = 'img/products';
                $profileImage = date('YmdHis') . '_' . Str::random(5) . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $imagePaths[] = $destinationPath . '/' . $profileImage;
            }
            $input['images'] = json_encode($imagePaths);

            if ($product->images) {
                $existingImages = json_decode($product->images);
                foreach ($existingImages as $oldImage) {
                    $oldImagePath = public_path($oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
        }

        $input['category_id'] = $request->category_id;
        $product->update($input);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        if ($product->images) {
            $existingImages = json_decode($product->images);
            foreach ($existingImages as $oldImage) {
                $oldImagePath = public_path($oldImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        if ($product->pdf) {
            $pdfPath = public_path($product->pdf);
            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

}
