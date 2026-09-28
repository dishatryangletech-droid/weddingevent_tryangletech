<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBannerPortfolio;
use App\Models\PortfolioMaster;

class HomePortfolioController extends Controller
{
    public function index()
    {
        $portfolios = HomeBannerPortfolio::orderBy('sort_order', 'asc')->get();
        $masterPortfolios = PortfolioMaster::all();
        $addedTitles = $portfolios->pluck('title')->toArray();
        return view('backend.home.portfolio.index', compact('portfolios', 'masterPortfolios', 'addedTitles'));
    }

    public function storePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_master_id' => 'required|exists:portfolio_masters,id',
        ]);

        $master = PortfolioMaster::findOrFail($request->portfolio_master_id);

        $portfolio = new HomeBannerPortfolio();
        $portfolio->title = $master->title;
        $portfolio->description = $master->description;
        $portfolio->icon = $master->image; // fallback to image if icon is same

        $portfolio->sort_order = HomeBannerPortfolio::max('sort_order') + 1;
        $portfolio->save();

        return redirect()->back();
    }

    public function deletePortfolio($id)
    {
        HomeBannerPortfolio::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderPortfolios(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'exists:home_banner_portfolios,id',
        ]);

        foreach ($request->order as $index => $id) {
            HomeBannerPortfolio::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
