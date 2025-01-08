<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add Book</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      </head>
      
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid" style="align-content: center">
                <h2 class="navbar-brand">
                  ADD BOOK
                </h2>
              
              </div>
            
          </nav>
          
    
    
      
    
        </div>
        <div class="container">
         <div class="row">
            <div class="col-lg-6">
                <form action="/bookadd" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3 mt-3">
                      <label  for="name">Book Name:</label>
                      <input type="text" class="form-control @error ('book_name') is-invalid @enderror" id="book_name" placeholder="Enter Book Name" name="book_name" value={{old('book_name')}}>
                      
                    </div>
                    <span>@error('book_name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror</span>
      
                    <div class="mb-3 mt-3">
                      <label for="author">Author:</label>
                      <input type="text" class="form-control @error ('author') is-invalid @enderror" id="author" placeholder="Enter author name" name="author" value={{old('author')}}>
                    </div>
                    <span>
                        @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </span>
      
      
                    <div class="mb-3 mt-3">
                      <label for="description">Description:</label>
                      <input type="text" row=5 class="form-control @error ('description') is-invalid @enderror" id="description" placeholder="Enter description" name="description" value={{old('description')}}>
                     
                    </div>
                    <span>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </span>
      
      
                  
                    
                    <button type="submit" class="btn btn-primary">Add Book</button>
                  </form>
            </div>
         </div>
        </div>
        
    </body>
</html>

  


