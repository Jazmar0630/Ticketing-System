@extends('tickets.layout')
@section('content')
<div class="page-title">🔔 Follow Up</div>

@forelse($tickets as $ticket)
<div class="card p-3 mb-3 border-start border-warning border-4">
    <div class="d-flex justify-content-between">
        <strong>{{ $ticket->title }}</strong>
        <span class="badge bg-secondary">{{ $ticket->category }}</span>
    </div>
    <p class="text-muted mt-1 mb-0" style="font-size:14px"><i class="bi bi-chat-left-text me-1"></i>{{ $ticket->follow_up }}</p>
</div>
@empty
<div class="card p-4 text-center text-muted mb-4">No follow-up notes yet.</div>
@endforelse

<div class="page-title mt-4">Add / Edit Follow-up</div>
@foreach(\App\Models\Ticket::latest()->get() as $ticket)
<div class="card p-3 mb-3">
    <strong class="mb-2 d-block">{{ $ticket->title }}</strong>
    <form method="POST" action="{{ route('tickets.followup.update', $ticket) }}" class="d-flex gap-2">
        @csrf @method('PATCH')
        <input type="text" name="follow_up" class="form-control form-control-sm" placeholder="Add follow-up note..." value="{{ $ticket->follow_up }}">
        <button type="submit" class="btn btn-dark btn-sm px-3"><i class="bi bi-save"></i></button>
    </form>
</div>
@endforeach
@endsection
