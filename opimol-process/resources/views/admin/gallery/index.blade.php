@extends('layouts.admin')

@section('title', 'Manage Gallery')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Gallery Images</h1>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add New Image
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="row">
            @forelse($galleryImages as $image)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/gallery/' . $image->image) }}" class="card-img-top" alt="{{ $image->title ?? 'Gallery Image' }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $image->title ?? 'Untitled' }}</h5>
                        @if($image->description)
                            <p class="card-text small text-muted">{{ \Illuminate\Support\Str::limit($image->description, 50) }}</p>
                        @endif
                        <p class="card-text">
                            <small class="text-muted">Order: {{ $image->order }}</small>
                            <span class="float-end">
                                @if($image->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </span>
                        </p>
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-between">
                        <a href="{{ route('admin.gallery.edit', $image) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted mb-0">No gallery images found.</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-sm btn-primary mt-3">Add your first image</a>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection