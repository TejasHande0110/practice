@extends('layouts.admin')

@section('title','Admin')

@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-center">
        <h1 class="mb-4 mt-4 text-primary">Pending Return Requests</h1>
    </div>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Transaction ID</th>
            <th>Student Name</th>
            <th>Book Name</th>
            <th>Purchase Date</th>
            <th>Return Date</th>
            <th>Request Date</th>

            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->transaction_id }}</td>
                
                <td>{{ $request->name }}</td>
                <td>{{$request->book_name}}</td>
                <td>{{ \Carbon\Carbon::parse($request->created_at)->format('d M Y')}}
                <td>{{ \Carbon\Carbon::parse($request->renew)->format('d M Y')}}
                <td>{{ \Carbon\Carbon::parse($request->update_at)->format('d M Y')}}
                
                <td>
                    <form action="{{ route('approveReturn', $request->transaction_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('rejectReturn', $request->transaction_id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection