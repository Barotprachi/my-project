<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; color: #333; }
        .navbar { background: #fff; border-bottom: 1px solid #eee; }
        .nav-link { font-weight: 500; color: #555; }
        .footer { background: #111; color: #ccc; padding: 40px 0; margin-top: 60px; }
        .footer a { color: #fff; text-decoration: none; }
    </style>
    @livewireStyles
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="/">LUXE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                   <li class="nav-item"><a class="nav-link px-3" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Categories</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Cart (0)</a></li>

                    @guest
                        <li class="nav-item">
                            <a class="btn btn-sm px-3 mx-1 fw-semibold text-white" style="background: linear-gradient(45deg, #0375e7, #0362c1); border: none;" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm px-3 mx-1 fw-semibold text-white" style="background: linear-gradient(45deg, #03752b, #056326); border: none;" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <span class="nav-link px-3">👋 {{ auth()->user()->name }}</span>
                        </li>

                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="btn btn-sm px-3 mx-1 fw-semibold text-white" style="background: linear-gradient(45deg, #343a40, #000); border: none;" href="{{ route('admin.dashboard') }}">
                                    Admin Panel
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-sm px-3 mx-1 fw-semibold text-white" style="background: linear-gradient(45deg, #e32608, #c70303); border: none;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                    
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5" style="min-height: 80vh;">
        {{ $slot }}
    </main>

    <footer class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="text-white mb-3">LUXE.</h5>
                    <p class="small">The best curated selection of products for your daily lifestyle needs.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="text-white mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Shipping Info</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="text-white mb-3">Contact</h5>
                    <p class="small">support@luxeshop.com</p>
                </div>
            </div>
            <hr class="mt-4 border-secondary">
            <p class="mb-0 small">&copy; 2026 Luxe Ecommerce. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>