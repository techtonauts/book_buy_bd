<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function showMainCategories()
    {
        $mainCategories = Category::where('parent_id', null)
            ->withCount(['children', 'products'])
            ->get();
        return view('admin.categories.main', compact('mainCategories'));
    }

    public function showSubCategories()
    {
        $subCategories = Category::whereNotNull('parent_id')
            ->with(['parent'])
            ->withCount(['products'])
            ->get();
        $mainCategories = Category::where('parent_id', null)->get();
        return view('admin.categories.sub', compact(['subCategories', 'mainCategories']));
    }

    public function showCreate()
    {
        $mainCategories = Category::where('parent_id', null)->get();
        return view('admin.categories.create', compact('mainCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($validated);

        if ($validated['parent_id']) {
            return redirect()->route('admin.show.sub.categories')->with('success', 'Sub-category created successfully.');
        }
        return redirect()->route('admin.show.main.categories')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);

        if ($validated['parent_id']) {
            return redirect()->route('admin.show.sub.categories')->with('success', 'Sub-category updated successfully.');
        }
        return redirect()->route('admin.show.main.categories')->with('success', 'Category updated successfully.');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $isParent = $category->parent_id === null;

        if (Auth::user()->user_type !== 'superadmin' || Auth::user()->user_type !== 'admin') {
            if ($isParent) {
                return redirect()->route('admin.show.main.categories')->with('error', 'Unauthorized action.');
            }
            return redirect()->route('admin.show.main.categories')->with('error', 'Unauthorized action.');
        }

        $category->delete();

        if ($isParent) {
            return redirect()->route('admin.show.main.categories')->with('success', 'Category deleted successfully.');
        }
        return redirect()->route('admin.show.sub.categories')->with('success', 'Sub-category deleted successfully.');
    }
}
