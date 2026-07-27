<form action='{{ url("dashboard/degrees/store/gemini") }}' method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label class="form-label fw-bold">Select Targeted Course</label>
        <div class="input-group">
            <span class="input-group-text bg-light text-secondary"><i class="fas fa-graduation-cap"></i></span>
            <select name="course" class="form-select">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-4">
        <label class="form-label fw-bold">Upload pdf file</label>
        <div class="input-group">
            <span class="input-group-text bg-light text-secondary"><i class="fas fa-graduation-cap"></i></span>
            <input type="file" class="form-control" name="document" accept="application/pdf" required>
        </div>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary rounded-pill py-2 fs-5 fw-bold shadow-sm text-white">
            <i class="fas fa-check-circle me-2"></i> Submit Degrees
        </button>
    </div>
</form>