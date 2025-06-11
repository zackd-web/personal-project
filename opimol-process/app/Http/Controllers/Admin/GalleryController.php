<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $galleryImages = GalleryImage::orderBy('order')->get();
        return view('admin.gallery.index', compact('galleryImages'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/gallery'), $imageName);
            $validated['image'] = $imageName;
        }

        $validated['is_active'] = $request->has('is_active');
        
        GalleryImage::create($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image created successfully.');
    }

    public function edit(GalleryImage $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, GalleryImage $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if (file_exists(public_path('images/gallery/' . $gallery->image))) {
                unlink(public_path('images/gallery/' . $gallery->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/gallery'), $imageName);
            $validated['image'] = $imageName;
        }

        $validated['is_active'] = $request->has('is_active');
        
        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image updated successfully.');
    }

    public function destroy(GalleryImage $gallery)
    {
        // Delete image
        if (file_exists(public_path('images/gallery/' . $gallery->image))) {
            unlink(public_path('images/gallery/' . $gallery->image));
        }
        
        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image deleted successfully.');
    }
}