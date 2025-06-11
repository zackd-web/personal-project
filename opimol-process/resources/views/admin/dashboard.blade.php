@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-users me-2"></i> Characters</h5>
            </div>
            <div class="card-body">
                <h2 class="display-4 mb-0">{{ $charactersCount }}</h2>
                <p class="text-muted">Total characters in database</p>
                <a href="{{ route('admin.characters.index') }}" class="btn btn-sm btn-primary">Manage Characters</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i> Events</h5>
            </div>
            <div class="card-body">
                <h2 class="display-4 mb-0">{{ $eventsCount }}</h2>
                <p class="text-muted">Total events in database</p>
                <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-primary">Manage Events</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-images me-2"></i> Gallery</h5>
            </div>
            <div class="card-body">
                <h2 class="display-4 mb-0">{{ $galleryCount }}</h2>
                <p class="text-muted">Total gallery images in database</p>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-primary">Manage Gallery</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> Quick Guide</h5>
            </div>
            <div class="card-body">
                <p>Welcome to the OPIMOL Admin Dashboard! Here you can manage all the content for your One Piece community website.</p>
                
                <h6 class="mt-4">Managing Characters</h6>
                <p>Add, edit, or remove character profiles that appear in the "Favorite Characters" section of the website.</p>
                
                <h6 class="mt-3">Managing Events</h6>
                <p>Create and manage upcoming events for your community. Events can be categorized as meetups, cosplay events, or watch parties.</p>
                
                <h6 class="mt-3">Managing Gallery</h6>
                <p>Upload and organize images for the gallery section of the website.</p>
                
                <div class="alert alert-info mt-4">
                    <i class="fas fa-lightbulb me-2"></i> Tip: Remember to upload images with appropriate dimensions for best display quality. Character images should be square (1:1 ratio) for best results.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection