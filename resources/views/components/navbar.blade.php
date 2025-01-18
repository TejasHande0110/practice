@php

use Illuminate\Support\Facades\Auth;
@endphp
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="user-logo-dark.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
            <span class="welcome-message">Welcome, {{ session('user_name') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="/purchase">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/history">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/renew">Renew</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/returnBook">Return</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout" id="logout-link">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


