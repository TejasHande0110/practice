@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <div class="report-container shadow p-4 bg-light rounded">
        <div class="report-header text-center mb-4">
            <h1 class="display-4 text-primary">Library</h1>
            <h2 class="h3 text-secondary">Student Purchase History Report</h2>
        </div>

        <div class="student-info mb-4">
            <h3 class="h5 text-info">Student Information</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Student Name:</strong> {{ $student->name }}</li>
                <li class="list-group-item"><strong>Student ID:</strong> {{ $student->student_id }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $student->email }}</li>
                <li class="list-group-item"><strong>Department:</strong> {{ $student->department }}</li>
                <li class="list-group-item"><strong>Report Date:</strong> {{ now()->format('d M Y') }}</li>
            </ul>
        </div>

        <div class="summary-section mb-4">
            <h3 class="h5 text-info">Summary of Transactions</h3>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Total Books Purchased:</strong> {{ $totalBooksPurchased }}</p>
                    <p><strong>Books Returned:</strong> {{ $booksReturned }}</p>
                    <p><strong>Books Returned Late:</strong> {{ $booksReturnedLate }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Books Returned On Time:</strong> {{ $booksReturnedOnTime }}</p>
                    <p><strong>Active Books (Currently Borrowed):</strong> {{ $activeBooks }}</p>
                </div>
            </div>
        </div>

        <div class="transaction-history mb-4">
            <h3 class="h5 text-info">Detailed Transaction History</h3>
            @foreach($transactions as $transaction)
            <div class="transaction card mb-3 d-flex flex-row align-items-center">
                <div class="card-body d-flex flex-column w-75">
                    <h5 class="card-title">Transaction ID: {{ $transaction->transaction_id }}</h5>
                    <p><strong>Book Name:</strong> {{ $transaction->book_name }}</p>
                    <p><strong>Book ID:</strong> {{ $transaction->book_id }}</p>
                    <p><strong>Purchase Date:</strong> {{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</p>
                    <p><strong>Return Date:</strong> {{ \Carbon\Carbon::parse($transaction->return)->format('d M Y') ?? 'N/A' }}</p>
                    <p><strong>Status:</strong> <span class="btn btn-success }}">{{ ucfirst($transaction->status) }}</span></p>
                    <p><strong>Late Return:</strong> {{ $transaction->status == 'rejected' ? 'Yes' : 'No' }}</p>
                </div>
                <div class="book-image w-25">
                    @if($transaction->book_image)
                    <img src="{{ asset('images/' . $transaction->book_image) }}" alt="Book Image" class="img-fluid rounded">
                    @else
                    <img src="https://via.placeholder.com/150" alt="No Image Available" class="img-fluid rounded">
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="summary-remarks mb-4">
            <h3 class="h5 text-info">Summary Remarks</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Frequent Book Categories:</strong> Fiction (or dynamically generated)</li>
                <li class="list-group-item"><strong>Average Borrowing Period:</strong> 15 days (or dynamically calculated)</li>
            </ul>
        </div>

        <div class="report-footer text-center mt-5">
            <p><strong>Prepared By:</strong> Librarian’s Name</p>
            <p>Library Contact Information</p>
            <p>Institution Address</p>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .report-container {
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .transaction {
        border-left: 4px solid #007bff;
        background-color: #ffffff;
    }

    .transaction .card-body {
        background-color: #f8f9fa;
    }

    .report-header h1, .report-header h2 {
        color: #343a40;
    }

    .summary-section p, .transaction p {
        font-size: 1.1rem;
    }

    .summary-remarks p {
        font-size: 1rem;
        color: #6c757d;
    }

    .report-footer p {
        font-size: 1rem;
        color: #6c757d;
    }

    .badge {
        font-size: 1rem;
        font-weight: bold;
    }

    .book-image img {
        max-width: 150px;
        object-fit: cover;
        margin-left: 10px;
    }
</style>
@endsection
