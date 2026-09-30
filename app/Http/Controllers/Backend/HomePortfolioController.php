<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePortfolioSection;
use App\Models\HomeBannerPortfolio;
use App\Models\HomeRecommendedPortfolio;
use App\Models\PortfolioItem;

class HomePortfolioController extends Controller
{
    public function index()
    {
        $section = HomePortfolioSection::first();
        
        $bannerPortfolios = HomeBannerPortfolio::orderBy('sort_order', 'asc')->get();
        $bannerAddedTitles = $bannerPortfolios->pluck('title')->toArray();

        $recommendedPortfolios = HomeRecommendedPortfolio::orderBy('sort_order', 'asc')->get();
        $recommendedAddedTitles = $recommendedPortfolios->pluck('title')->toArray();

        $masterPortfolios = PortfolioItem::all();

        return view('backend.home.portfolio.index', compact(
            'section',
            'bannerPortfolios',
            'bannerAddedTitles',
            'recommendedPortfolios',
            'recommendedAddedTitles',
            'masterPortfolios'
        ));
    }

    public function updateSection(Request $request)
    {
        $section = HomePortfolioSection::first() ?? new HomePortfolioSection();
        $section->tagline = $request->tagline;
        $section->title = $request->title;
        $section->button_text = $request->button_text;
        $section->button_link = $request->button_link;
        $section->save();

        return redirect()->back();
    }

    // --- 1. Banner Portfolios ---
    public function storeBannerPortfolio(Request $request)
    {
        $request->validate([
            'portfolio_master_id' => 'required|exists:portfolio_items,id',
        ]);

        $master = PortfolioItem::findOrFail($request->portfolio_master_id);

        $portfolio = new HomeBannerPortfolio();
        $portfolio->title = $master->title;
        $portfolio->description = $master->description;
        $portfolio->icon = $master->image;

        $portfolio->sort_order = HomeBannerPortfolio::max('sort_order') + 1;
        $portfolio->save();

        return redirect()->back();
    }

    public function deleteBannerPortfolio($id)
    {
        HomeBannerPortfolio::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderBannerPortfolios(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'exists:home_banner_portfolios,id',
        ]);

        foreach ($request->order as $index => $id) {
            HomeBannerPortfolio::where('id', $id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }

    // --- 2. Recommended Portfolios ---
    public function storeRecommendedPortfolio(Request $request)
    {
        $request->validate([
            'portfolio_master_id' => 'required|exists:portfolio_items,id',
        ]);

        $master = PortfolioItem::findOrFail($request->portfolio_master_id);

        $portfolio = new HomeRecommendedPortfolio();
        $portfolio->title = $master->title;
        $portfolio->description = $master->description;
        $portfolio->icon = $master->image;

        $portfolio->sort_order = HomeRecommendedPortfolio::max('sort_order') + 1;
        $portfolio->save();

        return redirect()->back();
    }

    public function deleteRecommendedPortfolio($id)
    {
        HomeRecommendedPortfolio::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderRecommendedPortfolios(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'exists:home_recommended_portfolios,id',
        ]);

        foreach ($request->order as $index => $id) {
            HomeRecommendedPortfolio::where('id', $id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}
