<?php

namespace App\Http\Controllers;

use App\Report;
use App\Product;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Report $report, Product $product)
    {
        $reports = $report->whereDate('created_at', Carbon::today())->latest()->paginate(20);
        $stockBelow = $product->where('stock', '<', 100)->get();

        return view('home')->with([
            'reports' => $reports,
            'belowProducts' => $stockBelow
        ]);
    }
}
