<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Student & Course Management System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-light">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
                <div class="container">
                    <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                        Student & Course Management System
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
                                </li>
                            @endauth
                        </ul>
                        <ul class="navbar-nav">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="py-5">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @guest
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-8">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body text-center">
                                        <h1 class="display-5 fw-bold text-primary">Welcome to SCMS</h1>
                                        <p class="lead">A system designed to manage Somali high school students and their courses.</p>
                                        <p>Track students like Abdi Hassan and assign them to subjects like Biology, Mathematics, or History with ease.</p>
                                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">Login to Start</a>
                                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg mt-3 ms-2">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        {{ $slot }}
                    @endauth
                </div>
            </main>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>