<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $products=Products::where('status','0')
            ->where('new_arrival_products','1')
            ->orderBy('created_at','desc')
            ->take(15)
            ->get();
        return view('frontend.index', compact('products'));
    }
    public function newarrival()
    {
        $products=Products::where('status','0')
            ->where('new_arrival_products','1')
            ->orderBy('created_at','desc')
            ->get();
        return view('frontend.newarrivals.index', compact('products'));

    }
    public function featured()
    {
        $products=Products::where('status','0')
            ->where('featured_products','1')
            ->orderBy('created_at','desc')
            ->get();
        return view('frontend.featured.index', compact('products'));

    }
    public function popular()
    {
        $products=Products::where('status','0')
            ->where('popular_products','1')
            ->orderBy('created_at','desc')
            ->get();
        return view('frontend.popular.index', compact('products'));

    }
    public function aboutus()
    {
        return view('frontend.about.index');
    }
    public function offer()
    {
        $products=Products::where('status','0')
            ->where('offered_products','1')
            ->orderBy('created_at','desc')
            ->get();
        return view('frontend.offer.index', compact('products'));

    }
}
