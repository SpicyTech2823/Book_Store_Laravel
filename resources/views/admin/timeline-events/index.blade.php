@extends('admin.layout')

@section('page-title', 'Timeline Events')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Timeline Events</h1>
        <a href="{{ route('admin.timeline-events.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Timeline Event
        </a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Year</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td><strong>{{ $event->year }}</strong></td>
                            <td>{{ $event->title }}</td>
                            <td>{{ Str::limit($event->description, 50) }}</td>
                            <td>
                                @if($event->icon)
                                    <i class="{{ $event->icon }}"></i> {{ $event->icon }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $event->order ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.timeline-events.edit', $event) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.timeline-events.delete', $event) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No timeline events found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
