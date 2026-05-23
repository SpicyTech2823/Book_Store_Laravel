@push('styles')
<style>
    .icon-picker-input {
        display: flex;
        gap: 8px;
    }

    .icon-preview {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        font-size: 20px;
        color: #6c757d;
        background-color: #f8f9fa;
    }

    .icon-preview span {
        font-size: 12px;
        white-space: nowrap;
    }

    .icon-picker-modal .modal-body {
        max-height: 60vh;
        overflow-y: auto;
    }

    .icon-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(60px, 1fr));
        gap: 10px;
    }

    .icon-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 12px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
        background-color: white;
    }

    .icon-item:hover {
        border-color: #3b82f6;
        background-color: #f0f9ff;
    }

    .icon-item.selected {
        border-color: #3b82f6;
        background-color: #dbeafe;
    }

    .icon-item i {
        font-size: 24px;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .icon-item span {
        font-size: 11px;
        text-align: center;
        color: #6b7280;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 100%;
    }

    .icon-search {
        margin-bottom: 15px;
    }

    .icon-search input {
        width: 100%;
    }
</style>
@endpush

<div class="mb-3">
    <label for="{{ $fieldName }}" class="form-label">Icon (optional)</label>
    <div class="icon-picker-input">
        <input
            type="text"
            class="form-control @error($fieldName) is-invalid @enderror"
            id="{{ $fieldName }}"
            name="{{ $fieldName }}"
            value="{{ $value ?? '' }}"
            placeholder="Click to select an icon"
            readonly>
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#iconPickerModal">
            <i class="fas fa-icons"></i> Browse
        </button>
    </div>
    <div class="icon-preview mt-2" id="iconPreview">
        @if($value ?? false)
            <i class="fas fa-{{ $value }}"></i>
        @endif
    </div>
    @error($fieldName)<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
</div>

@push('modals')
<!-- Icon Picker Modal -->
<div class="modal fade" id="iconPickerModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content icon-picker-modal">
            <div class="modal-header">
                <h5 class="modal-title">Select an Icon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="icon-search">
                    <input type="text" id="iconSearch" class="form-control" placeholder="Search icons...">
                </div>
                <div class="icon-grid" id="iconGrid">
                    <!-- Icons will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fieldName = '{{ $fieldName }}';
    const inputField = document.getElementById(fieldName);
    const iconPreview = document.getElementById('iconPreview');
    const iconGrid = document.getElementById('iconGrid');
    const iconSearch = document.getElementById('iconSearch');

    const icons = [
        'book', 'book-open', 'bookmark', 'pen', 'pencil', 'pen-fancy', 'pen-nib',
        'star', 'heart', 'thumbs-up', 'thumbs-down', 'smile', 'frown', 'laugh',
        'fire', 'lightning-bolt', 'bolt', 'clock', 'calendar', 'map', 'location-pin',
        'dollar-sign', 'euro-sign', 'pound-sign', 'tag', 'tags', 'gift', 'box',
        'cube', 'cube-alt', 'shopping-bag', 'shopping-cart', 'shop', 'store',
        'search', 'magnifying-glass', 'filter', 'sort', 'arrow-up', 'arrow-down',
        'arrow-left', 'arrow-right', 'check', 'times', 'plus', 'minus', 'multiply',
        'divide', 'equals', 'list', 'bars', 'bars-progress', 'chart-line', 'chart-bar',
        'pie-chart', 'users', 'user', 'user-plus', 'user-minus', 'user-circle',
        'cog', 'gears', 'wrench', 'hammer', 'screwdriver', 'tools', 'briefcase',
        'folder', 'folder-open', 'file', 'file-pdf', 'file-word', 'file-excel',
        'file-image', 'image', 'photo', 'camera', 'video', 'play', 'pause',
        'stop', 'volume-up', 'volume-down', 'volume-mute', 'music', 'headphones',
        'envelope', 'envelope-open', 'message', 'comments', 'phone', 'mobile',
        'tablet', 'laptop', 'desktop', 'server', 'database', 'cloud', 'download',
        'upload', 'link', 'unlink', 'chain', 'paperclip', 'lock', 'unlock',
        'key', 'shield', 'badge', 'skull', 'crosshairs', 'compass', 'globe',
        'sun', 'moon', 'star-half', 'circle', 'square', 'triangle', 'home',
        'car', 'bicycle', 'plane', 'train', 'rocket', 'motorcycle', 'truck',
        'traffic-light', 'sign', 'megaphone', 'bell', 'quote', 'info',
        'exclamation', 'question', 'warning', 'check-circle', 'times-circle',
        'ban', 'certificate', 'medal', 'trophy', 'cup', 'crown', 'gem'
    ];

    function renderIcons(filtered = icons) {
        iconGrid.innerHTML = '';
        filtered.forEach(icon => {
            const iconItem = document.createElement('div');
            iconItem.className = 'icon-item';
            if (inputField.value === icon) {
                iconItem.classList.add('selected');
            }
            iconItem.innerHTML = `<i class="fas fa-${icon}"></i><span>${icon}</span>`;
            iconItem.onclick = () => selectIcon(icon);
            iconGrid.appendChild(iconItem);
        });
    }

    function selectIcon(icon) {
        inputField.value = icon;
        updatePreview(icon);
        // Update selected state
        document.querySelectorAll('.icon-item').forEach(item => {
            item.classList.remove('selected');
        });
        event.target.closest('.icon-item').classList.add('selected');
        // Close modal
        bootstrap.Modal.getInstance(document.getElementById('iconPickerModal')).hide();
    }

    function updatePreview(icon) {
        if (icon) {
            iconPreview.innerHTML = `<i class="fas fa-${icon}"></i>`;
        } else {
            iconPreview.innerHTML = '';
        }
    }

    // Search functionality
    iconSearch.addEventListener('input', function(e) {
        const search = e.target.value.toLowerCase();
        const filtered = icons.filter(icon => icon.includes(search));
        renderIcons(filtered);
    });

    // Initial render
    renderIcons();

    // Restore modal state when opened
    document.getElementById('iconPickerModal').addEventListener('show.bs.modal', function() {
        iconSearch.value = '';
        renderIcons();
    });
});
</script>
@endpush
