<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="user-logo-dark.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
                <span class="welcome-message">Welcome, Admin</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/addBook">Add Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reports">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/allbuys">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/renewRequests">Renew</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/returnRequest">Return</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/adminlogout" id="logout-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    

    <div class="content">
        @yield('content')
    </div>

    <x-footer />
    @yield('scripts')

</body>
</html>
