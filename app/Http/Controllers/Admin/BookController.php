<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['images', 'category', 'prices'])->get();
        return view('admin.books.index', compact('books'));
    }


    public function showCreate()
    {
        $categories = Category::get();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'author' => 'required|string|max:255',
        //     'category_id' => 'required|exists:categories,id',
        //     'price' => 'required|numeric|min:0',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // $book = Book::create($request->only('title', 'author', 'category_id', 'price'));

        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('books', 'public');
        //     $book->images()->create(['path' => $path]);
        // }

        return redirect()->route('admin.show.books')->with('success', 'Book created successfully.');
    }
}
