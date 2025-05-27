<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookImage;
use Illuminate\Support\Facades\Storage;

class BookImageController extends Controller
{

    public function uploadTemp(Request $request)
    {


        $paths = [];

        $files = $request->file('images');

        if (is_array($files)) {
            foreach ($files as $file) {
                $filename = 'temp_' . uniqid() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                $path = $file->storeAs('temp-images', $filename, 'public'); // saved in storage/app/temp-images
                $paths[] = $path;
            }
        } elseif ($files instanceof \Illuminate\Http\UploadedFile) {
            $filename = 'temp_' . uniqid() . '_' . str_replace(' ', '_', $files->getClientOriginalName());
            $path = $files->storeAs('temp-images', $filename, 'public'); // saved in storage/app/temp-images
            $paths[] = $path;
        }

        return response()->json(['paths' => $paths]);
    }

    public function deleteTemp(Request $request)
    {
        $path = $request->input('path');

        // Strip "storage/" if user submitted full public path
        $relativePath = str_replace('storage/', '', $path);

        // Delete from public storage
        $fullPath = storage_path('app/public/' . $relativePath);

        if (file_exists($fullPath)) {
            unlink($fullPath);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'File not found'], 404);
    }

    public function deleteExisting(Request $request)
    {
        $path = $request->input('path');
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);

            // Optional: Remove DB reference
            // e.g. remove $path from $book->images and save()

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function delete(Request $request, $id)
    {
        $image = BookImage::findOrFail($id);
        Storage::disk('public')->delete($image->url);
        $image->delete();

        return response()->json(['success' => true]);
    }
}
