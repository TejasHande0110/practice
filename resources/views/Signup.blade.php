<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sign Up</title>

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
                  <a class="nav-link active" href="/SignUp">Sign Up</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
                </li>
               
              </ul>
            </div>
          </nav>
          
          <div class="container mt-3">
            <h2>Sign Up</h2>
            <form action="/register" method="POST">
              @csrf
              @method('POST')
              <div class="mb-3 mt-3">
                <label  for="name">Name:</label>
                <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" placeholder="Enter your full name" name="name" value={{old('name')}}>
                
              </div>
              <span>@error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror</span>

              <div class="mb-3 mt-3">
                <label for="department">Department:</label>
                <input type="text" class="form-control @error ('department') is-invalid @enderror" id="department" placeholder="Enter department" name="department" value={{old('department')}}>
              </div>
              <span>
                  @error('department')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </span>


              <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control @error ('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value={{old('email')}}>
               
              </div>
              <span>
                  @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </span>


            <div class="mb-3 mt-3">
                <label for="pno">Phone Number:</label>
                <input type="text" class="form-control @error ('pno') is-invalid @enderror" id="phoneNumber" placeholder="Enter Phone Number" name="pno" value={{old('pno')}} >
            </div>
            <span>
                @error('pno')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </span>


              <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control @error ('pass') is-invalid @enderror" id="pwd" placeholder="Enter password" name="pass" value={{old('pass')}} >
              </div>
              <span>
                @error('pass')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </span>
              
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
    </body>
</html>
