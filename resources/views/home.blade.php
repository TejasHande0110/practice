<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      </head>
      
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                  <img src="user-logo.png" alt="Logo" style="width:40px;" class="rounded-pill">
                  
                </a>
              
              </div>
            <div class="container-flex" style=" justify-items:right">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="/home">Books</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/purchase">Purchase</a>
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
          
    
    </body>
</html>
