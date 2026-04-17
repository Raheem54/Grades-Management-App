@extends("admin.layout")

@section("title")
courses
@endsection

@section("main")
<div class="container py-5">
    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-book me-2"></i> courses
            </h5>
            <a class="btn btn-sm btn-light rounded-pill px-3 fw-bold shadow-sm" href="{{ url('dashboard/courses/create') }}">
                <i class="fas fa-plus-circle me-1"></i> add course  
</a>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr class="text-secondary text-uppercase small fw-bolder">
                            <th class="ps-4 py-3">name </th>
                            <th class="text-center py-3">Max Degree</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3 text-primary">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <span class="fw-bold text-dark">{{ $course->name }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-primary px-3 py-2 fs-6">
                                    {{ $course->max_degree }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection