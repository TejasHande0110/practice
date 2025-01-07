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
                  <img src="img_avatar1.png" alt="Logo" style="width:40px;" class="rounded-pill">
                  
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
          
          <div class="container d-flex align-items-center">

           
           <h3>{{ session()->get('student_id') }}</h3>
            <h1 class="mb-10 mt-10">Available Book Details</h1>
            <table class="table table-bordered">
               <thead>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Author</th>
                
               </thead>
               <tbody>
                @foreach ($books as $book)
                <tr>
                 <td>{{$book->book_id}}</td>
                 <td>{{$book->book_name}}</td>
                 <td>{{$book->author}}</td>
                 <td>
                  <a href="{{ url('/purchase/' . session()->get('student_id') . '/' . $book->book_id) }}" class="btn btn-success">Purchase</a>
                 

                 </td>
                </tr>
                @endforeach
               </tbody>
    
            </table>
    
    
    
    
    
    
        </div>
    </body>
</html>
