@extends('admin.layout')

@section('page-title', 'Edit Timeline Event')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.timeline-events') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.timeline-events.update', $event) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="year" class="form-label"><strong>Year</strong></label>
                    <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror"
                           value="{{ $event->year }}" required>
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label"><strong>Title</strong></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ $event->title }}" placeholder="Enter timeline event title" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Description</strong></label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                              rows="4" placeholder="Enter timeline event description" required>{{ $event->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon" class="form-label"><strong>Icon (Font Awesome)</strong></label>
                    <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror"
                           value="{{ $event->icon }}" placeholder="e.g., fas fa-book, fas fa-star">
                    <small class="form-text text-muted">Font Awesome icon class (optional)</small>
                    @if($event->icon)
                        <div class="mt-2">
                            <i class="{{ $event->icon }} fa-2x"></i> Preview
                        </div>
                    @endif
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label"><strong>Order</strong></label>
                    <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror"
                           value="{{ $event->order }}" placeholder="Display order (optional)">
                    <small class="form-text text-muted">Numeric value for sorting (optional)</small>
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Event
                    </button>
                    <a href="{{ route('admin.timeline-events') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
