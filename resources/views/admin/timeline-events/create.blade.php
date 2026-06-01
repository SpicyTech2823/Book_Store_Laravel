@extends('admin.layout')

@section('page-title', 'Create Timeline Event')

@push('styles')
<style>
    .icon-picker-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(60px, 1fr));
        gap: 10px;
        max-height: 400px;
        overflow-y: auto;
    }

    .icon-item {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
        text-align: center;
        flex-direction: column;
    }

    .icon-item:hover {
        border-color: #3b82f6;
        background-color: #f0f9ff;
    }

    .icon-item i {
        font-size: 24px;
        margin-bottom: 5px;
        color: #3b82f6;
    }

    .icon-item-label {
        font-size: 11px;
        color: #6b7280;
        word-break: break-word;
    }

    .icon-preview {
        font-size: 48px;
        text-align: center;
        color: #3b82f6;
        margin: 20px 0;
    }

    .icon-selected {
        border-color: #3b82f6;
        background-color: #dbeafe;
    }
</style>
@endpush

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.timeline-events') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.timeline-events.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="year" class="form-label"><strong>Year</strong></label>
                    <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror"
                           value="{{ old('year') }}" required>
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label"><strong>Title</strong></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}" placeholder="Enter timeline event title" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Description</strong></label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                              rows="4" placeholder="Enter timeline event description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon" class="form-label"><strong>Icon (Font Awesome)</strong></label>
                    <div class="input-group">
                        <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror"
                               value="{{ old('icon') }}" placeholder="Click button to select icon" readonly>
                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#iconPickerModal">
                            <i class="fas fa-palette"></i> Pick Icon
                        </button>
                    </div>
                    <small class="form-text text-muted">Click "Pick Icon" to select from Font Awesome icons (optional)</small>
                    @if(old('icon'))
                        <div class="icon-preview">
                            <i class="{{ old('icon') }}"></i>
                        </div>
                    @endif
                    @error('icon')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label"><strong>Order</strong></label>
                    <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror"
                           value="{{ old('order') }}" placeholder="Display order (optional)">
                    <small class="form-text text-muted">Numeric value for sorting (optional)</small>
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Event
                    </button>
                    <a href="{{ route('admin.timeline-events') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Icon Picker Modal -->
    <div class="modal fade" id="iconPickerModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Font Awesome Icon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" id="iconSearch" class="form-control" placeholder="Search icons...">
                    </div>
                    <div class="icon-picker-grid" id="iconGrid"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const icons = [
            'fas fa-book', 'fas fa-star', 'fas fa-heart', 'fas fa-rocket', 'fas fa-lightbulb',
            'fas fa-briefcase', 'fas fa-chart-line', 'fas fa-code', 'fas fa-cog', 'fas fa-bell',
            'fas fa-building', 'fas fa-calendar', 'fas fa-camera', 'fas fa-coffee', 'fas fa-cube',
            'fas fa-database', 'fas fa-diamond', 'fas fa-envelope', 'fas fa-file', 'fas fa-flask',
            'fas fa-gamepad', 'fas fa-gift', 'fas fa-globe', 'fas fa-graduation-cap', 'fas fa-handshake',
            'fas fa-headphones', 'fas fa-home', 'fas fa-inbox', 'fas fa-key', 'fas fa-laptop',
            'fas fa-lock', 'fas fa-mail', 'fas fa-medal', 'fas fa-microscope', 'fas fa-mobile',
            'fas fa-moon', 'fas fa-newspaper', 'fas fa-palette', 'fas fa-paper-plane', 'fas fa-phone',
            'fas fa-plane', 'fas fa-plug', 'fas fa-puzzle-piece', 'fas fa-recycle', 'fas fa-ring',
            'fas fa-road', 'fas fa-robot', 'fas fa-ruler', 'fas fa-ruler-combined', 'fas fa-satellite',
            'fas fa-search', 'fas fa-server', 'fas fa-shield', 'fas fa-ship', 'fas fa-shopping-cart',
            'fas fa-sign', 'fas fa-signal', 'fas fa-snowflake', 'fas fa-solar-panel', 'fas fa-sort',
            'fas fa-sparkles', 'fas fa-speaker', 'fas fa-spoon', 'fas fa-spray-can', 'fas fa-square',
            'fas fa-stamp', 'fas fa-star-half', 'fas fa-sticky-note', 'fas fa-stopwatch', 'fas fa-store',
            'fas fa-storm', 'fas fa-stream', 'fas fa-streetview', 'fas fa-strikethrough', 'fas fa-strip',
            'fas fa-stroopwafel', 'fas fa-sun', 'fas fa-sushi', 'fas fa-swatchbook', 'fas fa-swimmer',
            'fas fa-swimmingpool', 'fas fa-sync', 'fas fa-syringe', 'fas fa-table', 'fas fa-tablet',
            'fas fa-tachometer', 'fas fa-tag', 'fas fa-tags', 'fas fa-tape', 'fas fa-tasks',
            'fas fa-taxi', 'fas fa-team', 'fas fa-teeth', 'fas fa-teeth-open', 'fas fa-telescope',
            'fas fa-temperature', 'fas fa-temperature-high', 'fas fa-temperature-low', 'fas fa-tenge',
            'fas fa-tennis', 'fas fa-tent', 'fas fa-terminal', 'fas fa-terrarium', 'fas fa-test',
            'fas fa-text', 'fas fa-text-height', 'fas fa-text-width', 'fas fa-th', 'fas fa-th-large',
            'fas fa-th-list', 'fas fa-thank', 'fas fa-thanks', 'fas fa-thanksgiving', 'fas fa-theater',
            'fas fa-theater-masks', 'fas fa-thermometer', 'fas fa-think', 'fas fa-thinking', 'fas fa-third',
            'fas fa-thimble', 'fas fa-thistle', 'fas fa-thistle-alt', 'fas fa-thistle-leaf', 'fas fa-thistle-rose',
            'fas fa-thorn', 'fas fa-thorn-leaf', 'fas fa-thorn-rose', 'fas fa-thought', 'fas fa-thousand',
            'fas fa-thread', 'fas fa-threads', 'fas fa-threat', 'fas fa-three', 'fas fa-three-d',
            'fas fa-three-letter', 'fas fa-three-point', 'fas fa-three-point-turn', 'fas fa-three-stars',
            'fas fa-three-stars-award', 'fas fa-three-step', 'fas fa-three-step-forward', 'fas fa-three-with-circle',
            'fas fa-threshold', 'fas fa-threshold-list', 'fas fa-thrift', 'fas fa-thrift-store', 'fas fa-thrifty',
            'fas fa-thrill', 'fas fa-thriller', 'fas fa-thrive', 'fas fa-thriving', 'fas fa-throat',
            'fas fa-throat-slash', 'fas fa-throb', 'fas fa-throne', 'fas fa-throng', 'fas fa-throttle',
            'fas fa-throttle-up', 'fas fa-throw', 'fas fa-throw-and-catch', 'fas fa-throwing', 'fas fa-thrown',
            'fas fa-thru', 'fas fa-thrust', 'fas fa-thud', 'fas fa-thud-sound', 'fas fa-thug'
        ];

        function displayIcons(searchTerm = '') {
            const grid = document.getElementById('iconGrid');
            grid.innerHTML = '';
            const filteredIcons = icons.filter(icon =>
                icon.toLowerCase().includes(searchTerm.toLowerCase())
            );

            const currentIcon = document.getElementById('icon').value;

            filteredIcons.forEach(icon => {
                const div = document.createElement('div');
                div.className = 'icon-item' + (icon === currentIcon ? ' icon-selected' : '');
                div.innerHTML = `<i class="${icon}"></i><span class="icon-item-label">${icon.split(' ')[1]}</span>`;
                div.onclick = () => selectIcon(icon);
                grid.appendChild(div);
            });
        }

        function selectIcon(icon) {
            document.getElementById('icon').value = icon;

            // Update preview
            const preview = document.querySelector('.icon-preview');
            if (preview) {
                preview.innerHTML = `<i class="${icon}"></i>`;
            } else {
                const newPreview = document.createElement('div');
                newPreview.className = 'icon-preview';
                newPreview.innerHTML = `<i class="${icon}"></i>`;
                document.getElementById('icon').parentElement.appendChild(newPreview);
            }

            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('iconPickerModal'));
            modal.hide();

            // Highlight selected icon
            displayIcons(document.getElementById('iconSearch').value);
        }

        document.getElementById('iconSearch').addEventListener('keyup', (e) => {
            displayIcons(e.target.value);
        });

        // Initialize when modal is shown
        document.getElementById('iconPickerModal').addEventListener('show.bs.modal', () => {
            displayIcons();
        });
    </script>
    @endpush
@endsection
