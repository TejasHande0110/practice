@extends('layouts.layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-center">
        <h1 class="mb-4 mt-4 text-primary">Request Renew</h1>
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
                    <td>{{\Carbon\Carbon::parse($transaction->renew)->format('d M Y')}}</td>
                    <td><a href="{{ url('/request/'  . $transaction->book_id) }}" class="btn btn-success" style="align-content: center">Request to Renew</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection