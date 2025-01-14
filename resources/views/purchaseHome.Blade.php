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
<div class="alert alert-success```php
@php
    \Log::info('User ' . session('user_id') . ' is viewing the book list.');
@endphp
``` alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container mt-4">
    <div class="row">
        @foreach($books as $book)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card" style="width: 18rem; height: 500px">
                <img src="{{ asset('images/' . $book->image) }}" class="card-img-top" alt="{{ $book->book_name }}">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center; font-family: Lucida Handwriting">{{$book->book_name}}</h5>
                    <label>Written by - {{$book->author}}</label>
                    <p class="card-text">
                        {{ \Illuminate\Support\Str::words($book->description, 50, '...') }}
                        @if(\Illuminate\Support\Str::wordCount($book->description) > 50)
                        <a href="#" class="read-more-link" data-bs-toggle="modal" data-bs-target="#bookModal{{$book->id}}">Read more</a>
                        @endif
                    </p>
                    <a href="{{ url('/purchase/' . session('user_id'). '/' . $book->book_id) }}" class="btn btn-success" style="align-content: center">Purchase</a>
                </div>
            </div>
        </div>

        <!-- Modal for displaying full description -->
        <div class="modal fade" id="bookModal{{$book->id}}" tabindex="-1" aria-labelledby="bookModalLabel{{$book->id}}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookModalLabel{{$book->id}}">{{$book->book_name}}</h5>
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
