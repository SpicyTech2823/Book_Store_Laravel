@extends('admin.layout')

@section('page-title', 'Edit Testimonial')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Edit Testimonial</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $testimonial->name }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4" required>{{ $testimonial->message }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating *</label>
                            <select class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                                <option value="1" @if($testimonial->rating == 1) selected @endif>1 Star</option>
                                <option value="2" @if($testimonial->rating == 2) selected @endif>2 Stars</option>
                                <option value="3" @if($testimonial->rating == 3) selected @endif>3 Stars</option>
                                <option value="4" @if($testimonial->rating == 4) selected @endif>4 Stars</option>
                                <option value="5" @if($testimonial->rating == 5) selected @endif>5 Stars</option>
                            </select>
                            @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Testimonial
                            </button>
                            <a href="{{ route('admin.testimonials') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
