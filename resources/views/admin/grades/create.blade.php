@extends("admin.layout")

@section("title")
Assign Student Degrees
@endsection

@section("main")
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0 rounded-3 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-file-import me-2"></i> Import Course Degrees
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

                    
                    <div id="card">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Select Method</label>
                            <div class="input-group">
                                <select name="method" class="form-select mb-3" id="method">
                                    <option value="" selected hidden>please Choose</option>
                                    <option value="prompt">prompt</option>
                                    <option value="gemini">gemini</option>
                                </select>
                            </div>
                        </div>
                        <div id="view-prompt" class="method-view" style="display: none;">
                            @include('admin.grades.prompt')
                        </div>
    
                        <div id="view-gemini" class="method-view" style="display: none;">
                            @include('admin.grades.gemini')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    const select=document.getElementById("method")
    const viewPrompt = document.getElementById("view-prompt");
    const viewGemini = document.getElementById("view-gemini");
    select.addEventListener("change",function(e){

        viewPrompt.style.display = "none";
        viewGemini.style.display = "none";
    
        if (select.value === "prompt") {
            viewPrompt.style.display = "block";
        } else if (select.value === "gemini") {
            viewGemini.style.display = "block";
        }
    })
</script>
@endsection
