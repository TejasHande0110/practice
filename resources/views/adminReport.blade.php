@extends('layouts.admin')

@section('content')

<div class="container my-5">
    <div class="card">
        
        <div class="card-header bg-dark text-white">
            <h4>Student Overview</h4>
        </div>
        @foreach ($students as $student)
            
       
            
        
        <div class="card-body">
            <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Department:</strong> {{ $student->department }}</p>
            <p><strong>Latest Book Purchased:</strong> {{ $student->book_name ?? 'N/A' }}</p>
        </div>
        <div class="card-footer bg-dark text-white">
            <a href="{{ route('report.generate', $student->student_id) }}" class="btn btn-light">
                Generate Detailed Report
            </a>
            
        </div>
        <hr>
        <br>
        @endforeach()
       
    </div>
</div>
@endsection




