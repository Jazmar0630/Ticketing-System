@extends('tickets.layout')
@section('content')
<div class="page-title">🔧 Technical Tickets</div>
@forelse($tickets as $ticket)
<div class="card p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">{{ $ticket->title }}</h6>
        <span class="badge rounded-pill {{ in_array($ticket->status, ['resolved','closed']) ? 'bg-success' : 'bg-warning text-dark' }}">
            {{ str_replace('_',' ', $ticket->status) }}
        </span>
    </div>
    <p class="text-muted mb-3" style="font-size:14px">{{ $ticket->description }}</p>

    <form method="POST" action="{{ route('tickets.technical.update', $ticket) }}" class="mb-3">
        @csrf @method('PATCH')
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Accepted By</label>
                <input type="text" name="accepted_by" class="form-control" value="{{ $ticket->accepted_by }}">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Date Accepted</label>
                <input type="date" name="date_accepted" class="form-control" value="{{ $ticket->date_accepted }}">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Time Accepted</label>
                <input type="time" name="time_accepted" class="form-control" value="{{ $ticket->time_accepted }}">
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-sm mt-3 px-4"><i class="bi bi-save me-1"></i>Save</button>
    </form>

    <form method="POST" action="{{ route('tickets.status.update', $ticket) }}" class="d-flex align-items-center gap-2">
        @csrf @method('PATCH')
        <select name="status" class="form-select form-select-sm" style="width:auto">
            @foreach(['open','in_progress','resolved','closed'] as $s)
                <option value="{{ $s }}" {{ $ticket->status === $s ? 'selected' : '' }}>{{ str_replace('_',' ',$s) }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-dark btn-sm px-3">Update Status</button>
    </form>
</div>
@empty
<div class="card p-4 text-center text-muted">No technical tickets found.</div>
@endforelse
@endsection
