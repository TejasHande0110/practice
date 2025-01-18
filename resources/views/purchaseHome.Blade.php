@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-end">
        <div class="col-lg-3 col-md-12 col-sm-12">
            <input type="text" id="searchBar" class="form-control" placeholder="Search for books...">
        </div>
    </div>
</div>

@if(session('failure'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('failure') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container mt-4">
    <div class="row">
        @foreach($books as $book)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card book-card">
                <img src="{{ asset('images/' . $book->image) }}" class="card-img-top book-img" alt="{{ $book->book_name }}">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center; font-family: Lucida Handwriting">{{$book->book_name}}</h5>
                    <label>Written by - {{$book->author}}</label>
                    <p class="card-text">
                        {{ \Illuminate\Support\Str::words($book->description, 20, '...') }}
                        @if(\Illuminate\Support\Str::wordCount($book->description) > 20)
                        <a href="#" class="read-more-link" data-bs-toggle="modal" data-bs-target="#bookModal{{$book->book_id}}">Read more</a>
                        @endif
                    </p>
                    <a href="{{ url('/purchase/' . session('user_id'). '/' . $book->book_id) }}" class="btn btn-success">Purchase</a>
                </div>
            </div>
        </div>

        <!-- Modal for displaying full description -->
        <div class="modal fade" id="bookModal{{$book->book_id}}" tabindex="-1" aria-labelledby="bookModalLabel{{$book->book_id}}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookModalLabel{{$book->book_id}}">{{$book->book_name}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/' . $book->image) }}" class="img-fluid mb-3" alt="{{ $book->book_name }}">
                        <p><strong>Author:</strong> {{$book->author}}</p>
                        <p>{{$book->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
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
@endsection


@section('styles')
<style>
    .book-card {
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        width: 18rem;
        height: 480px; /* Adjusted card height */
        margin: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .book-img {
        height: 250px; /* Adjusted image height */
        width: auto;
        object-fit: cover;
        margin: 0 auto;
        display: block;
    }

    .card-body {
        padding: 15px;
        background-color: #f8f9fa;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-title {
        font-family: 'Lucida Handwriting', cursive;
        text-align: center;
        color: #343a40;
        font-size: 1.1rem;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 15px;
    }

    .read-more-link {
        color: #007bff;
        text-decoration: none;
    }

    .read-more-link:hover {
        text-decoration: underline;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        padding: 8px 20px;
        font-size: 0.9rem;
        text-align: center;
        width: 100%;
        transition: background-color 0.3s;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    select.form-control {
        border-radius: 5px;
        font-size: 1rem;
        padding: 5px;
    }

    .alert {
        margin-top: 20px;
    }
</style>
@endsection
