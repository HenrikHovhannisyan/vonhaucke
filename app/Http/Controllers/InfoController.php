<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Http\Requests\StoreInfoRequest;
use App\Http\Requests\UpdateInfoRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $infos = Info::all();
        return view('admin.info.index', compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInfoRequest $request
     * @return RedirectResponse
     */
    public function store(StoreInfoRequest $request)
    {
        $request->validate([
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone1' => 'required|string|max:20',
            'phone2' => 'string|max:20',
            'address' => 'required|string',
        ]);

        Info::create($request->all());

        return redirect()->route('info.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Info $info
     * @return Factory|View
     */
    public function show(Info $info)
    {
        return view('admin.info.show', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Info $info
     * @return Factory|View
     */
    public function edit(Info $info)
    {
        return view('admin.info.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInfoRequest $request
     * @param Info $info
     * @return RedirectResponse
     */
    public function update(UpdateInfoRequest $request, Info $info)
    {
        $request->validate([
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone1' => 'required|string|max:20',
            'phone2' => 'string|max:20',
            'address' => 'required|string',
        ]);

        $info->update($request->all());

        return redirect()->route('info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Info $info
     * @return RedirectResponse
     */
    public function destroy(Info $info)
    {
        $info->delete();
        return redirect()->route('info.index');
    }
}
