<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $partners = Partner::latest()->paginate(5);

        return view('admin.partners.index',compact('partners'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePartnerRequest $request
     * @return RedirectResponse
     */
    public function store(StorePartnerRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image =$request->file('image')) {

            $destinationPath = 'img/partners/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";

        }

        Partner::create($input);

        return redirect()->route('partners.index')
            ->with('success','Partner created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Partner $partner
     * @return Factory|View
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show',compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @return Factory|View
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePartnerRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'img/partners/';

            if ($partner->image) {
                $oldImagePath = public_path($destinationPath . $partner->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        } else {
            unset($input['image']);
        }

        $partner->update($input);

        return redirect()->route('partners.index')
            ->with('success', 'Partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function destroy(Partner $partner)
    {
        if ($partner->image) {
            $destinationPath = 'img/partners/';
            $imagePath = public_path($destinationPath . $partner->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $partner->delete();

        return redirect()->route('partners.index')
            ->with('success', 'Partner deleted successfully');
    }
}
