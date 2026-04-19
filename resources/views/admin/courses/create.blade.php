@extends("admin.layout")

@section("title")
add course 
@endsection

@section("main")
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-3 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-plus-circle me-2"></i> add course  
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ url('dashboard/courses/store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold text-dark">Name </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-secondary">
                                    <i class="fas fa-book"></i>
                                </span>
                                <input type="text" id="name" name="name" class="form-control border-start-0 ps-0" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="max_degree" class="form-label fw-bold text-dark">Max Degree</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-secondary">
                                    <i class="fas fa-star"></i>
                                </span>
                                <input type="number" step="0.01" id="max_degree" name="max_degree" class="form-control border-start-0 ps-0" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill py-2 fs-5 fw-bold shadow-sm text-white">
                                <i class="fas fa-save me-2"></i> add
                            </button>
                            <a href="{{ url('dashboard/courses') }}" class="btn btn-link text-muted text-decoration-none small mt-2">
                                <i class="fas fa-arrow-left me-1"></i> back  
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection