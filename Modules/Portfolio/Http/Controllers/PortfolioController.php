<?php

namespace Modules\Portfolio\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Portfolio\Entities\Portfolio;
use Modules\Portfolio\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('status', 'desc')->paginate(10)->withQueryString();
        return view('portfolio::main.index', [
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('portfolio::main.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PortfolioRequest $request)
    {
        Portfolio::create($request->validated() + [
            'cv' => $request->hasFile('cv_file') ? $request->file('cv_file')->store('portfolio/document', 'public') : '',
            'cover_letter' => $request->hasFile('cover_letter_file') ? $request->file('cover_letter_file')->store('portfolio/document', 'public') : ''
        ]);
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio Added');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('portfolio::main.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Portfolio $portfolio)
    {
        return view('portfolio::main.edit', [
            'portfolio' => $portfolio
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        if($request->hasFile('cv')) $this->deleteFile($portfolio->getRawOriginal('cv'));

        if($request->hasFile('cover_letter')) $this->deleteFile($portfolio->getRawOriginal('cover_letter'));

        $portfolio->update($request->validated() + [
            'cv' => $request->hasFile('cv_file') ? $request->file('cv_file')->store('portfolio', 'public') : $portfolio->getRawOriginal('cv'),
            'cover_letter' => $request->hasFile('cover_letter_file') ? $request->file('cover_letter_file')->store('portfolio', 'public') : $portfolio->getRawOriginal('cover_letter')
        ]);
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio Updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Portfolio $portfolio)
    {
        $cv = $portfolio->getRawOriginal('cv');
        if($cv) $this->deleteFile($cv);

        $cover_letter = $portfolio->getRawOriginal('cover_letter');
        if($cover_letter) $this->deleteFile($cover_letter);

        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio Deleted');
    }

    private function deleteFile($file)
    {
        if(Storage::exists($file))
            Storage::delete($file);
    }
}
