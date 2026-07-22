<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');
        $searchQuery = $request->query('q');

        $categories = Category::all();
        $query = MenuItem::with('category')->where('is_available', true);

        if ($selectedCategory !== 'all') {
            $query->whereHas('category', function ($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        }

        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('name', 'like', "%{$searchQuery}%")
                  ->orWhere('description', 'like', "%{$searchQuery}%");
            });
        }

        $items = $query->orderBy('is_bestseller', 'desc')->get();
        $waPhone = env('WA_PHONE_NUMBER', '6281234567890');

        return view('menu.index', compact('categories', 'items', 'selectedCategory', 'searchQuery', 'waPhone'));
    }

    public function getItem(MenuItem $item)
    {
        return response()->json([
            'id' => $item->id,
            'name' => $item->name,
            'category' => $item->category->name,
            'description' => $item->description,
            'price' => $item->price,
            'formatted_price' => $item->formatted_price,
            'image_url' => $item->image_url,
            'spicy_level' => $item->spicy_level,
            'is_bestseller' => $item->is_bestseller,
        ]);
    }
}
