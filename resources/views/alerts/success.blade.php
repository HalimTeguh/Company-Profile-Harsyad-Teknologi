@if (session($key ?? 'status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success" style="display: flex; justify-content: space-between; align-items: center;">
        <span>{{ session($key ?? 'status') }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="icon-lg" style="cursor: pointer;" onclick="document.getElementById('alert-success').style.display='none';">
            <path fill="currentColor" fill-rule="evenodd" d="M5.636 5.636a1 1 0 0 1 1.414 0l4.95 4.95 4.95-4.95a1 1 0 0 1 1.414 1.414L13.414 12l4.95 4.95a1 1 0 0 1-1.414 1.414L12 13.414l-4.95 4.95a1 1 0 0 1-1.414-1.414l4.95-4.95-4.95-4.95a1 1 0 0 1 0-1.414" clip-rule="evenodd"></path>
        </svg>
    </div>
@endif

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var alertElement = document.getElementById('alert-success');
        var closeIcon = alertElement.querySelector('svg');

        if (closeIcon) {
            closeIcon.addEventListener('click', function () {
                alertElement.style.display = 'none';
            });
        }
    });
</script>
@endpush
