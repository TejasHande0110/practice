<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Store</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                  <img src="img_avatar1.png" alt="Logo" style="width:40px;" class="rounded-pill">
                </a>
                <div class="container-flex ms-auto">
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
            </div>
        </nav>

        <div class="container mt-4">
          <div class="row justify-content-end">
            <div class="col-lg-3 col-md-12 col-sm-12">
              <input type="text" id="searchBar" class="form-control" placeholder="Search for books...">
            </div>
          </div>
        </div>

        <div class="container mt-4">
          <div class="row">
              @foreach($books as $book)
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                  <div class="card" style="width: 18rem; height: 390px">
                      <img src="{{ asset('assets/books.webp') }}" class="card-img-top" alt="image">
                      <div class="card-body">
                          <h5 class="card-title" style="text-align: center; font-family: Lucida Handwriting">{{$book->book_name}}</h5>
                          <label>Written by - {{$book->author}}</label>
                          <p class="card-text">{{$book->description}}</p>
                          <a href="{{ url('/purchase/' . session('user_id'). '/' . $book->book_id) }}" class="btn btn-success" style="align-content: center">Purchase</a>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
      
        <script>
          document.getElementById('searchBar').addEventListener('input', function() {
              let query = this.value.toLowerCase();
              let bookCards = document.querySelectorAll('.card');
      
              bookCards.forEach(card => {
                  let title = card.querySelector('.card-title').textContent.toLowerCase();
                  if (title.startsWith(query) || query === '') {
                      card.parentElement.style.display = 'block';
                  } else {
                      card.parentElement.style.display = 'none';
                  }
              });
          });
      </script>
    </body>
</html>
