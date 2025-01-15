@extends('layouts.admin')

@section('title', 'History')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-center">
        <h1 class="mb-4 mt-4 text-primary">Recent Buys</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Book Name</th>
                    <th>Purchase Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->transaction_id }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->book_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</td>
                    <td>{{$transaction->renew}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
