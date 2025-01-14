@extends('layouts.admin')

@section('title', 'Add Book')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-4">
        <div class="container-fluid">
            <h2 class="navbar-brand">
                ADD BOOK
            </h2>
        </div>
    </nav>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            <form action="/bookadd" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="book_name">Book Name:</label>
                    <input type="text" class="form-control @error('book_name') is-invalid @enderror" id="book_name" placeholder="Enter Book Name" name="book_name" value="{{ old('book_name') }}">
                    @error('book_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 mt-3">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" placeholder="Enter author name" name="author" value="{{ old('author') }}">
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 mt-3">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Enter description" name="description" value="{{ old('description') }}">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 mt-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>
        </div>
    </div>
</div>
@endsection
