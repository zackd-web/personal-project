@extends('layouts.admin')

@section('title', 'Manage Characters')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">All Characters</h1>
    <a href="{{ route('admin.characters.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add New Character
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="80">Image</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($characters as $character)
                    <tr>
                        <td>
                            <img src="{{ asset('images/characters/' . $character->image) }}" alt="{{ $character->name }}" class="img-thumbnail" width="60">
                        </td>
                        <td>{{ $character->name }}</td>
                        <td>{{ $character->role }}</td>
                        <td>{{ $character->order }}</td>
                        <td>
                            @if($character->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.characters.edit', $character) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.characters.destroy', $character) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this character?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <p class="text-muted mb-0">No characters found.</p>
                            <a href="{{ route('admin.characters.create') }}" class="btn btn-sm btn-primary mt-3">Add your first character</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection