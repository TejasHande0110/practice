
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="user-logo-dark.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
                <span class="welcome-message">Welcome, {{ session('user_name') }}</span>
            </a>
        </div>
        <div class="container-flex" style=" justify-items:right">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="/home">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/purchase">Purchase</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/history">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/renew">Renew</a>
                </li>
            </ul>
        </div>
    </nav>
    
