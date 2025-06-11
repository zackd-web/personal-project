<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Event;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $charactersCount = Character::count();
        $eventsCount = Event::count();
        $galleryCount = GalleryImage::count();

        return view('admin.dashboard', compact('charactersCount', 'eventsCount', 'galleryCount'));
    }
}