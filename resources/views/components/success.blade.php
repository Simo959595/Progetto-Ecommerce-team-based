@if (session('success'))
    <div class="container d-flex justify-content-center z-3 position-custom">
        <div class="alert alert-success d-flex align-items-center justify-content-between shadow-sm p-3 rounded position-relative col-md-9"> 
            <span class="flex-grow-1 text-success fw-semibold">{{ session('success') }}</span>
            <button type="button" class="btn-close position-absolute top-50 end-0 translate-middle-y me-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
