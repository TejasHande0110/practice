@extends('layouts.layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-center">
        <h1 class="mb-4 mt-4 text-primary">Return Book</h1>
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
                    <td><a href="{{ url('/return/'  . $transaction->transaction_id) }}" class="btn btn-success" style="align-content: center">Return Book</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

 <!-- Bootstrap Modal -->
 <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title active" id="messageModalLabel">WARNING</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Message content will be dynamically inserted here by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function showModal(message, type) {
    const modalBody = document.getElementById('modalBody');
    const modal = new bootstrap.Modal(document.getElementById('messageModal'));
    modalBody.textContent = message;

    if (type === 'success') {
        modalBody.classList.remove('text-danger');
        modalBody.classList.add('text-success');
    } else {
        modalBody.classList.remove('text-success');
        modalBody.classList.add('text-danger');
    }

    modal.show();
}

document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
        showModal('{{ session('success') }}', 'success');
    @endif
    @if(session('failure'))
        showModal('{{ session('failure') }}', 'failure');
    @endif
});
</script>
@endsection