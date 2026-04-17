<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>تسجيل الدخول</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-lg-4 py-sm-2">
        <div class="container position-relative justify-content-center">
            <a class="navbar-brand-center fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('uploads/logo.png') }}" width='180' height='70' alt="">
            </a>
            <div class="navbar-nav ms-auto invisible">Login</div> 
        </div>
    </nav>
<div class="log">
    <div class="container d-flex justify-content-center mt-5 " style="margin-top: -50px;">
        <div class="card login-card w-100" style="max-width: 500px;">
            <div class="card-body p-5">
                
                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm mb-4">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-triangle me-2"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action='{{ url("login") }}' class="d-flex flex-column">
                    @csrf
                    <h3 class="text-center mb-4 fw-bold">Login</h3>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">user name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="text" class="form-control" placeholder="user name" name="email" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                        </div>
                    </div>

                    <div class="mb-4 form-check d-flex align-items-center gap-2">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label for="remember" class="form-check-label small text-muted">Remember me on this device</label>
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill text-white px-4 py-2 fs-5 fw-bold shadow-sm">
                        Sign In <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
    <footer class="bg-primary pt-1 pb-2">
    <div class="container">
        <div class="text-center">
            <h3 class="text-white fw-bolder create">Creators</h3>
        </div>
        <br>
        <div class="d-flex justify-content-around text-center">
            <h4 class="text-white fw-bold raheem cursor-pointer text-decoration-underline" 
                data-bs-toggle="popover" 
                data-bs-trigger="hover focus" 
                data-bs-placement="top" 
                data-bs-html="true" 
                data-bs-content="<img src='{{ asset('uploads/raheem.png') }}' class='rounded-circle border border-primary shadow-sm' width='160' height='160'>">
                Raheem Elnashar
            </h4>

            <h4 class="text-white fw-bold omar cursor-pointer text-decoration-underline" 
                data-bs-toggle="popover" 
                data-bs-trigger="hover focus" 
                data-bs-placement="top" 
                data-bs-html="true" 
                data-bs-content="<img src='{{ asset('uploads/omar.png') }}' class='rounded-circle border border-primary shadow-sm' width='160' height='160'>">
                Omar Fadel
            </h4>

            <h4 class="text-white fw-bold rizk cursor-pointer text-decoration-underline" 
                data-bs-toggle="popover" 
                data-bs-trigger="hover focus" 
                data-bs-placement="top" 
                data-bs-html="true" 
                data-bs-content="<img src='{{ asset('uploads/risk.png') }}' class='rounded-circle border border-primary shadow-sm' width='160' height='160'>">
                Mohammad Rizk
            </h4>
        </div>
    </div>
</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    });
</script>
</body>
</html>