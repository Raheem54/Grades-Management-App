@extends("admin.layout")

@section("title")
Student Degrees
@endsection

@section("main")
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark border-start border-4 border-primary ps-3 mb-0">Degrees Sheets</h2>
                <a class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm text-white" href="{{ url('dashboard/degrees/create') }}">
                    <i class="fas fa-plus-circle me-1"></i> Add New Degrees
                </a>
            </div>
            
            @foreach ($courses as $course)
            <div class="card shadow-sm border-0 rounded-3 mb-5 overflow-hidden">
                <div class="card-header bg-dark d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 text-white fw-bold">
                        <i class="fas fa-layer-group text-primary me-2"></i> {{ $course->name }}
                    </h5>
                    <span class="badge bg-primary rounded-pill px-3">
                        Max Degree: {{ $course->max_degree }}
                    </span>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr class="text-secondary small fw-bolder text-uppercase">
                                    <th class="ps-4 py-3">Student Name</th>
                                    <th class="text-center py-3">Degree</th>
                                    <th class="text-center py-3">Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course->students as $user)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-light rounded-circle text-center me-2" style="width: 35px; height: 35px; line-height: 35px;">
                                                <i class="fas fa-user text-muted"></i>
                                            </div>
                                            <span class="fw-bold text-dark">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="fw-bold text-primary">{{ $user->pivot->grade ?? 0 }}</span>
                                        <span class="text-muted small"> / {{ $course->max_degree }}</span>
                                    </td>
                                    <td class="text-center" style="min-width: 150px;">
                                        @php
                                            $percentage = ($course->max_degree > 0) ? ($user->pivot->grade / $course->max_degree) * 100 : 0;
                                        @endphp
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: {{ $percentage }}%"></div>
                                        </div>
                                        <small class="text-muted">{{ number_format($percentage, 1) }}%</small>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection