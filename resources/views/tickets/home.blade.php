@extends('tickets.layout')
@section('content')
<div class="page-title">🏠 Dashboard</div>

<div class="card p-4 mb-4">
    <h6 class="fw-bold mb-3">Submit New Ticket</h6>
    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Category</label>
            <select name="category" class="form-select">
                <option value="technical">Technical</option>
                <option value="arrangement">Arrangement</option>
                <option value="general">General</option>
            </select>
        </div>
        <button type="submit" class="btn btn-dark px-4">Submit Ticket</button>
    </form>
</div>

<div class="page-title">All Tickets</div>
@forelse($tickets as $ticket)
<div class="card p-3 mb-3">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <strong>{{ $ticket->title }}</strong>
            <p class="text-muted mb-1 mt-1" style="font-size:14px">{{ $ticket->description }}</p>
            <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $ticket->created_at->diffForHumans() }}</small>
        </div>
        <div class="d-flex gap-2 flex-wrap justify-content-end">
            <span class="badge rounded-pill bg-secondary">{{ $ticket->category }}</span>
            <span class="badge rounded-pill {{ in_array($ticket->status, ['resolved','closed']) ? 'bg-success' : 'bg-warning text-dark' }}">
                {{ str_replace('_',' ', $ticket->status) }}
            </span>
        </div>
    </div>
</div>
@empty
<div class="card p-4 text-center text-muted">No tickets yet. Submit one above!</div>
@endforelse
@endsection
