@extends("admin.layout")

@section("title")
Create New User
@endsection

@section("main")
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-3 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-user-plus me-2"></i> Register New Student
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm mb-4">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fas fa-exclamation-triangle me-2"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('dashboard/users/store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold small">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-secondary border-end-0">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" id="name" name="name" class="form-control border-start-0 ps-0" placeholder="Enter student name" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold small">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-secondary border-end-0">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" id="email" name="email" class="form-control border-start-0 ps-0" placeholder="email@example.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold small">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-secondary border-end-0">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" id="password" name="password" class="form-control border-start-0 ps-0" placeholder="Minimum 8 characters" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold small">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-secondary border-end-0">
                                    <i class="fas fa-shield-alt"></i>
                                </span>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control border-start-0 ps-0" placeholder="Repeat password" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill py-2 fs-5 fw-bold shadow-sm text-white">
                                <i class="fas fa-check-circle me-1"></i> Create Account
                            </button>
                            <a href="{{ url('dashboard/users') }}" class="btn btn-link text-muted text-decoration-none small mt-1">
                                <i class="fas fa-arrow-left me-1"></i> Back to User List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection