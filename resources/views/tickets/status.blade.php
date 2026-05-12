@extends('tickets.layout')
@section('content')
<div class="page-title">📊 Ticket Status</div>

<h6 class="fw-bold text-danger mb-2"><i class="bi bi-exclamation-circle me-1"></i>Pending Tickets</h6>
<div class="card mb-4">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th><th>Title</th><th>Category</th><th>Status</th><th>Description</th><th>Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets->whereIn('status', ['open','in_progress']) as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td><strong>{{ $ticket->title }}</strong></td>
                    <td><span class="badge bg-secondary">{{ $ticket->category }}</span></td>
                    <td><span class="badge bg-warning text-dark">{{ str_replace('_',' ',$ticket->status) }}</span></td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">No pending tickets.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<h6 class="fw-bold text-success mb-2"><i class="bi bi-check-circle me-1"></i>Completed Tickets</h6>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead style="background:#166534; color:#fff">
                <tr>
                    <th>#</th><th>Title</th><th>Category</th><th>Status</th><th>Description</th><th>Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets->whereIn('status', ['resolved','closed']) as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td><strong>{{ $ticket->title }}</strong></td>
                    <td><span class="badge bg-secondary">{{ $ticket->category }}</span></td>
                    <td><span class="badge bg-success">{{ str_replace('_',' ',$ticket->status) }}</span></td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">No completed tickets.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
