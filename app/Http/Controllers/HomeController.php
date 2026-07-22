<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('menuItems')->get();
        $bestsellers = MenuItem::with('category')
            ->where('is_bestseller', true)
            ->where('is_available', true)
            ->take(6)
            ->get();
        $recommended = MenuItem::with('category')
            ->where('is_recommended', true)
            ->where('is_available', true)
            ->take(6)
            ->get();
        $reviews = Review::latest()->take(4)->get();
        $waPhone = env('WA_PHONE_NUMBER', '6281234567890');

        return view('home', compact('categories', 'bestsellers', 'recommended', 'reviews', 'waPhone'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        $waPhone = env('WA_PHONE_NUMBER', '6281234567890');
        return view('contact', compact('waPhone'));
    }
}
