@extends("layout")

@section("title")
طب ليه بيداري كده
@endsection

@section("main")
<div class="container mt-5 home">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 text-center">
                        <i class="fas fa-graduation-cap me-2"></i> درجات المواد الدراسية
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">اسم المادة</th>
                                    <th class="text-center">الدرجة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->courses as $course)
                                <tr>
                                    <td class="ps-4 align-middle">
                                        <i class="fas fa-book text-secondary me-2"></i>
                                        <span class="fw-bold">{{ $course->name }}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="badge rounded-pill bg-primary-light text-primary fw-bold px-3 py-2">
                                            {{ $course->pivot->grade ?? 'لا يوجد درجة' }}/{{ $course->max_degree }}
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
    </div>
</div>
@endsection