<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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

        return view('admin.products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.products.create');
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow multiple images
            'pdf' => 'file|mimes:pdf|max:2048', // Allow a PDF file
        ]);

        $input = $request->all();

        // Handle multiple images
        if ($request->hasFile('images')) {
            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $destinationPath = 'img/products/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $imagePaths[] = $destinationPath . $profileImage;
            }

            $input['images'] = json_encode($imagePaths); // Store as a JSON array
        }

        // Handle the PDF file
        if ($pdfFile = $request->file('pdf')) {
            $destinationPath = 'pdf/products/';
            $pdfFileName = date('YmdHis') . "." . $pdfFile->getClientOriginalExtension();
            $pdfFile->move($destinationPath, $pdfFileName);
            $input['pdf'] = $destinationPath . $pdfFileName;
        }

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
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Factory|View
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow multiple images
            'pdf' => 'file|mimes:pdf|max:2048', // Allow a PDF file
        ]);

        $input = $request->all();

        // Handle multiple images
        if ($request->hasFile('images')) {
            $imagePaths = $product->images ? json_decode($product->images) : [];

            $destinationPath = 'img/products';

            // Delete existing images
            foreach ($imagePaths as $oldImage) {
                $oldImagePath = public_path($oldImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new images and append to the existing ones
            foreach ($request->file('images') as $image) {
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $imagePaths[] = $destinationPath . '/' . $profileImage;
            }

            $input['images'] = json_encode($imagePaths); // Store as a JSON array
        }

        // Handle the PDF file
        if ($pdfFile = $request->file('pdf')) {
            $destinationPath = 'pdf/products';

            // Delete existing PDF file
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
        if ($product->image) {
            $destinationPath = 'img/products/';
            $imagePath = public_path($destinationPath . $product->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
