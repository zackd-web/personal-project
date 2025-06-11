<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Event;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $characters = Character::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        $events = Event::where('is_active', true)
            ->orderBy('event_date')
            ->get();
            
        $galleryImages = GalleryImage::where('is_active', true)
            ->orderBy('order')
            ->get();
        
        // Debug log to check if gallery images are being retrieved
        Log::info('Gallery Images Count: ' . $galleryImages->count());
        
        return view('home', compact('characters', 'events', 'galleryImages'));
    }
    
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'favorite' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        
        // Process the form submission (e.g., save to database, send email)
        // For now, we'll just redirect back with a success message
        
        return redirect()->back()->with('success', 'Thank you for your application! We will contact you soon to welcome you to our crew!');
    }
}