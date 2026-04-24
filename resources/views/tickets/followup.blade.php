@extends('tickets.layout')
@section('content')
<h2>🔔 Follow Up</h2>
@forelse($tickets as $ticket)
<div class="card">
    <strong>{{ $ticket->title }}</strong>
    <span class="badge badge-{{ $ticket->status }}">{{ $ticket->status }}</span>
    <p><em>Follow-up:</em> {{ $ticket->follow_up }}</p>
</div>
@empty
<p>No follow-up notes yet.</p>
@endforelse

<h3>Add Follow-up to a Ticket</h3>
@foreach(\App\Models\Ticket::latest()->get() as $ticket)
<div class="card">
    <strong>{{ $ticket->title }}</strong>
    <form method="POST" action="{{ route('tickets.followup.update', $ticket) }}">
        @csrf @method('PATCH')
        <textarea name="follow_up" rows="2" placeholder="Add follow-up note...">{{ $ticket->follow_up }}</textarea>
        <button type="submit" style="width:auto;padding:8px 16px">Save</button>
    </form>
</div>
@endforeach
@endsection
