<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student</title>

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
                  <img src="img_avatar1.png" alt="Logo" style="width:40px;" class="rounded-pill">
                </a>
              </div>
            <div class="container-flex" style=" justify-items:right">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link " href="/SignUp">Sign Up</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/login">Login</a>
                </li>
               
              </ul>
            </div>
          </nav>
          
    <div class="container">
        <div class="container mt-3">
            <h2>Log in</h2>
            <form action="/loginUser" method="POST">
              @csrf
              @method('POST')
           
              <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
              </div>
              
              <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
    </div>
    </body>
</html>
