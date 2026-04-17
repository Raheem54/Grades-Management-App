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
    <title>@yield('title')</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-sm-0 py-lg-4"> 
    <a class="navbar-brand-center fw-bold" href="{{ url('/') }}">
            <img src="{{ asset('uploads/logo.png') }}" width='180' height='70' alt="Logo">
        </a>
    <div class="container position-relative">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>
                            {{ Auth::user()->name ?? 'Guest' }} </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger border-0 bg-transparent">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @admin
        <li class="nav-item">
            <a class="nav-link fw-bold" href="{{ url('/dashboard/degrees') }}">
                <i class="fas fa-user-shield me-1 text-primary"></i> dashboard
            </a>
        </li>
        @endadmin
                </ul>
            </div>
        </li>
        </div>
    </nav>

    <main>
        @yield('main')
    </main>

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
    @yield("script")
</body>
</html>