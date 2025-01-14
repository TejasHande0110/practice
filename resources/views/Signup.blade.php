<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign Up</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar {
            padding: 0.5rem 1rem; /* Reduce navbar padding */
        }
        .navbar .welcome-message {
            margin-left: 10px; /* Adjust spacing between logo and message */
        }
        .card {
            padding: 1.5rem; /* Slightly reduce padding inside the card */
        }
        .card h2 {
            margin-bottom: 1rem; /* Reduce space below the heading */
        }
        body {
            padding: 0; /* Ensure no body padding */
            margin: 0; /* Ensure no body margin */
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <img src="user-logo-dark.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
            <span class="welcome-message">Welcome, {{ session('user_name') }}</span>
        </div>
        <div class="container-flex" style="justify-content: flex-end;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('SignUp')}}">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-3">Sign Up</h2>
            <form action="/register" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your full name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="department" class="form-label">Department:</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" placeholder="Enter department" name="department" value="{{ old('department') }}" required>
                    @error('department')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pno" class="form-label">Phone Number:</label>
                    <input type="text" class="form-control @error('pno') is-invalid @enderror" id="phoneNumber" placeholder="Enter Phone Number" name="pno" value="{{ old('pno') }}" required>
                    @error('pno')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control @error('pass') is-invalid @enderror" id="pwd" placeholder="Enter password" name="pass" required>
                    @error('pass')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="{{route('login')}}">Log in here</a></p>
                </div>
            </form>
        </div>
    </div>

    <x-footer />

</body>
</html>
