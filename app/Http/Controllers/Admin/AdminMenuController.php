<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminMenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');
        $categoryId = $request->query('category_id');

        $query = MenuItem::with('category');

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $menuItems = $query->orderBy('category_id')->orderBy('name')->paginate(15);
        $categories = Category::all();
        $totalItems = MenuItem::count();
        $availableItems = MenuItem::where('is_available', true)->count();

        return view('admin.menu.index', compact('menuItems', 'categories', 'search', 'categoryId', 'totalItems', 'availableItems'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.menu.form', [
            'item' => new MenuItem(),
            'categories' => $categories,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'image_url' => 'nullable|url|max:500',
            'is_bestseller' => 'nullable|boolean',
            'is_recommended' => 'nullable|boolean',
            'is_available' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . rand(100, 999);
        $validated['spicy_level'] = 0;
        $validated['is_bestseller'] = $request->has('is_bestseller');
        $validated['is_recommended'] = $request->has('is_recommended');
        $validated['is_available'] = $request->has('is_available');

        if (empty($validated['image_url'])) {
            $validated['image_url'] = 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80';
        }

        MenuItem::create($validated);

        return redirect()->route('admin.menu.index')->with('success', 'Menu baru berhasil ditambahkan!');
    }

    public function edit(MenuItem $menu)
    {
        $categories = Category::all();
        return view('admin.menu.form', [
            'item' => $menu,
            'categories' => $categories,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, MenuItem $menu)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'image_url' => 'nullable|url|max:500',
            'is_bestseller' => 'nullable|boolean',
            'is_recommended' => 'nullable|boolean',
            'is_available' => 'nullable|boolean',
        ]);

        if ($validated['name'] !== $menu->name) {
            $validated['slug'] = Str::slug($validated['name']) . '-' . rand(100, 999);
        }

        $validated['is_bestseller'] = $request->has('is_bestseller');
        $validated['is_recommended'] = $request->has('is_recommended');
        $validated['is_available'] = $request->has('is_available');

        $menu->update($validated);

        return redirect()->route('admin.menu.index')->with('success', 'Data menu berhasil diperbarui!');
    }

    public function destroy(MenuItem $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus!');
    }

    public function toggleAvailability(MenuItem $menu)
    {
        $menu->update(['is_available' => !$menu->is_available]);
        return back()->with('success', 'Status ketersediaan menu berhasil diubah!');
    }
}
