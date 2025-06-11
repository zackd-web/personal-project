@extends('layouts.admin')

@section('title', 'Manage Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">All Events</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add New Event
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="80">Image</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                    <tr>
                        <td>
                            <img src="{{ asset('images/events/' . $event->image) }}" alt="{{ $event->title }}" class="img-thumbnail" width="60">
                        </td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->event_date->format('M d, Y') }}</td>
                        <td>
                            @if($event->category == 'meetup')
                                <span class="badge bg-primary">Meetup</span>
                            @elseif($event->category == 'cosplay')
                                <span class="badge bg-success">Cosplay</span>
                            @elseif($event->category == 'watch')
                                <span class="badge bg-info">Watch Party</span>
                            @endif
                        </td>
                        <td>
                            @if($event->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <p class="text-muted mb-0">No events found.</p>
                            <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-primary mt-3">Add your first event</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection