<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use HTMLPurifier;
use HTMLPurifier_Config;



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

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:books,sku',
            'description' => 'required|string|min:10|max:2000',
            'author' => 'nullable|string|max:255',
            'edition' => 'nullable|string|max:255',
            'stock' => 'required|numeric|integer',
            'slug' => 'required|string|max:255|unique:books,slug',
            'category_id' => 'required|exists:App\Models\Category,id',
            'bookImages' => 'nullable|array|max:5',
            'prices' => [
                'required',
                'json',
                function ($attribute, $value, $fail) {
                    $decoded = json_decode($value, true);

                    if (!is_array($decoded) || count($decoded) === 0) {
                        $fail('The :attribute must contain at least one item.');
                    }

                    if (!array_is_list($decoded)) {
                        // It's an object, make sure it has at least one property
                        if (count($decoded) === 0) {
                            $fail('The :attribute must contain at least one property.');
                        }
                    } else {
                        // It's a list — check that it contains at least one object
                        if (!collect($decoded)->contains(fn($item) => is_array($item))) {
                            $fail('The :attribute must contain at least one object.');
                        }
                    }
                },
            ],
        ]);

        // Create HTML purifier instance
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        // Create the product

        $book = Book::create([
            'name' => $validated['name'],
            'sku' => $validated['sku'],
            'description' => $purifier->purify($validated['description']),
            'author' => $validated['author'],
            'edition' => $validated['edition'],
            'stock' => (int) $validated['stock'],
            'slug' => $validated['slug'],
            'category_id' => $validated['category_id'],
        ]);

        if (!$book) {
            return redirect()->route('admin.show.create.books')->with('error', 'Failed creating book!');
        }

        // Handle prices
        $prices = json_decode($validated['prices'], true);
        if (is_array($prices) && count($prices) > 0) {
            foreach ($prices as $type => $price) {
                $book->prices()->create([
                    'print_type' => $type,
                    'price' => (int)$price ?? 0,
                ]);
            }
        }

        // Handle temp images
        $storedImagePaths = [];

        if ($request->has('bookImages')) {
            foreach ($validated['bookImages'] as $tempPath) {
                if (Storage::disk('public')->exists($tempPath)) {
                    // Strip "storage/" prefix if present
                    $relativePath = str_replace('storage/', '', $tempPath);

                    $newPath = 'book-images/' . uniqid() . '_' . substr(basename($relativePath), 6);

                    Storage::disk('public')->move($relativePath, $newPath);

                    // Save image record to DB, or associate with book
                    $book->images()->create([
                        'name' => basename($newPath),
                        'url' => $newPath,
                    ]);

                    $storedImagePaths[] = $newPath;
                }
            }
        }

        return redirect()->route('admin.show.books')->with('success', 'Book created successfully.');
    }


    public function showUpdate(Request $request, $id)
    {
        $book = Book::with(['images', 'prices'])->findOrFail($id);

        $categories = Category::get();

        return view('admin.books.update', compact('book', 'categories'));
    }


    public function update(Request $request, $id)
    {


        $book = Book::with(['images', 'prices'])->find($id);
        if (!$book) {
            return redirect()->route('admin.show.books')->with('error', 'Book Not Found!');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => [
                'required',
                'string',
                'max:255',
                Rule::unique('books')->ignore($book)
            ],
            'description' => 'required|string|min:10|max:2000',
            'author' => 'nullable|string|max:255',
            'edition' => 'nullable|string|max:255',
            'stock' => 'required|numeric|integer',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('books')->ignore($book)
            ],
            'category_id' => 'required|exists:App\Models\Category,id',
            'bookImages' => 'nullable|array|max:5',
            'prices' => [
                'required',
                'json',
                function ($attribute, $value, $fail) {
                    $decoded = json_decode($value, true);

                    if (!is_array($decoded) || count($decoded) === 0) {
                        $fail('The :attribute must contain at least one item.');
                    }

                    if (!array_is_list($decoded)) {
                        // It's an object, make sure it has at least one property
                        if (count($decoded) === 0) {
                            $fail('The :attribute must contain at least one property.');
                        }
                    } else {
                        // It's a list — check that it contains at least one object
                        if (!collect($decoded)->contains(fn($item) => is_array($item))) {
                            $fail('The :attribute must contain at least one object.');
                        }
                    }
                },
            ],
        ]);

        // Create HTML purifier instance
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        // Update the book

        $book->name = $validated['name'];
        $book->sku = $validated['sku'];
        $book->description = $purifier->purify($validated['description']);
        $book->author = $validated['author'];
        $book->edition = $validated['edition'];
        $book->stock = (int) $validated['stock'];
        $book->slug = $validated['slug'];
        $book->category_id = $validated['category_id'];

        $book->save();



        // Handle prices
        $book->prices()->delete(); // Clean book prices
        // Re-create the updated prices
        $prices = json_decode($validated['prices'], true);
        if (is_array($prices) && count($prices) > 0) {
            foreach ($prices as $type => $price) {
                $book->prices()->create([
                    'print_type' => $type,
                    'price' => (int)$price ?? 0,
                ]);
            }
        }

        // Handle image update
        $submittedImages = $validated['bookImages'] ?? [];

        // Get existing image URLs from DB (relative paths like 'book-images/abc.jpg')
        $existingImagesInDb = $book->images()->pluck('url')->toArray();

        // Step 1: Determine which existing DB images were removed
        $submittedExistingImages = array_filter($submittedImages, function ($path) {
            return !str_starts_with($path, 'temp-images/');
        });

        $submittedImagesWithRelativePath = [];
        foreach ($submittedExistingImages as $path) {
            $submittedImagesWithRelativePath[] = env('BOOK_IMAGES_PATH', 'book-images/') . basename($path);
        }

        $imagesToDelete = array_diff($existingImagesInDb, $submittedImagesWithRelativePath);


        foreach ($imagesToDelete as $imageToDelete) {
            // Delete from storage
            Storage::disk('public')->delete($imageToDelete);

            // Delete from DB
            $book->images()->where('url', $imageToDelete)->delete();
        }

        // Step 2: Process new uploads from temp
        foreach ($submittedImages as $path) {
            if (str_starts_with($path, 'temp-images/')) {
                if (Storage::disk('public')->exists($path)) {

                    $newPath = 'book-images/' . uniqid() . '_' . substr(basename($path), 6);
                    $moved = Storage::disk('public')->move($path, $newPath);
                    if ($moved) {
                        $book->images()->create([
                            'name' => basename($newPath),
                            'url' => $newPath,
                        ]);
                    } else {
                        return redirect()->route('admin.show.update.books')->with('error', 'Failed to save image!');
                    }
                }
            }
        }
        return redirect()->route('admin.show.books')->with('success', 'Book updated successfully!');
    }

    public function delete(Request $request, $id)
    {
        $book = Book::with(['prices', 'images'])->find($id);
        if (!$book) {
            return redirect()->route('admin.show.books')->with('error', 'Book not found!');
        }

        $book->prices()->delete();
        $book->images()->delete();
        $book->delete();

        return redirect()->route('admin.show.books')->with('success', 'Book deleted successfully!');
    }
}
