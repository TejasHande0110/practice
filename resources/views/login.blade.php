<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

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
    <script>
        function toggleAdminLogin() {
            const userForm = document.getElementById('userLoginForm');
            const adminForm = document.getElementById('adminLoginForm');
            const toggleButton = document.getElementById('toggleButton');
            
            if (userForm.style.display === 'none') {
                userForm.style.display = 'block';
                adminForm.style.display = 'none';
                toggleButton.textContent = 'Switch to Admin Login';
            } else {
                userForm.style.display = 'none';
                adminForm.style.display = 'block';
                toggleButton.textContent = 'Switch to User Login';
            }
        }
    </script>
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
                    <a class="nav-link" href="/SignUp">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/login">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-3">Log in</h2>
            
            <!-- User Login Form -->
            <form id="userLoginForm" action="/loginUser" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
            
            <!-- Admin Login Form -->
            <form id="adminLoginForm" action="/loginAdmin" method="POST" style="display: none;">
                @csrf
                
                <div class="mb-3">
                    <label for="admin_id" class="form-label">Admin ID:</label>
                    <input type="text" class="form-control" id="admin_id" placeholder="Enter Admin ID" name="admin_id" required>
                </div>
                <div class="mb-3">
                    <label for="admin_email" class="form-label">Admin Email:</label>
                    <input type="email" class="form-control" id="admin_email" placeholder="Enter Admin Email" name="admin_email" required>
                </div>
                <div class="mb-3">
                    <label for="admin_pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="admin_pwd" placeholder="Enter password" name="admin_password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>

            <div class="text-center mt-3">
                <button id="toggleButton" class="btn btn-secondary" onclick="toggleAdminLogin()">Switch to Admin Login</button>
            </div>
        </div>
    </div>

</body>
</html>
