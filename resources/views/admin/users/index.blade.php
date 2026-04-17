@extends("admin.layout")

@section("title")
User Management
@endsection

@section("main")
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark border-start border-4 border-primary ps-3 mb-0">User Management</h2>
                <a class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm  text-white" href="{{ url('dashboard/users/create') }}">
                    <i class="fas fa-user-plus me-1"></i> Add New User
                </a>
            </div>

            <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="card-header bg-dark d-flex align-items-center py-3">
                    <h5 class="mb-0 text-white fw-bold">
                        <i class="fas fa-users text-primary me-2"></i> Registered Students
                    </h5>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr class="text-secondary small fw-bolder text-uppercase">
                                    <th class="ps-4 py-3" style="width: 100px;">ID</th>
                                    <th class="py-3">Student Name</th>
                                    <th class="py-3">User Name</th>
                                    <th class="py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="ps-4">
                                        <span class="badge bg-light text-dark border fw-bold">#{{ $user->id }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-primary-soft rounded-circle text-center me-3" style="width: 40px; height: 40px; line-height: 40px;">
                                                <i class="fas fa-user text-primary"></i>
                                            </div>
                                            <span class="fw-bold text-dark">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-muted"><i class="fas fa-envelope me-2 small"></i>{{ $user->email }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger text-white" href="{{ url('dashboard/users/delete/' . $user->id) }}"><i class="fas fa-trash"></i></a>
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