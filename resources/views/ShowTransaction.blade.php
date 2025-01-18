@extends('layouts.admin')

@section('title', 'History')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-center">
        <h1 class="mb-4 mt-4 text-primary">Recent Buys</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Email</th>
                    <th>Purchase Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->transaction_id }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->student_id }}</td>
                    <td>{{ $transaction->book_id }}</td>
                    <td>{{ $transaction->book_name }}</td>
                    <td>{{ $transaction->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</td>
                    <td>{{ $transaction->renew ? \Carbon\Carbon::parse($transaction->renew)->format('d M Y') : 'N/A' }}</td>
                    <td>{{ ucfirst($transaction->status) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .custom-table {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
    }

    .custom-table th, .custom-table td {
        text-align: center;
        vertical-align: middle;
    }

    .custom-table th {
        background-color: #343a40;
        color: #fff;
    }

    .custom-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .custom-table tr:hover {
        background-color: #e9ecef;
    }

    .text-primary {
        color: #007bff !important;
    }

    h1 {
        font-weight: bold;
    }
</style>
@endsection
