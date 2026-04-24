@extends('tickets.layout')
@section('content')
<h2>📋 Arrangement Tickets</h2>
@forelse($tickets as $ticket)
<div class="card">
    <strong>{{ $ticket->title }}</strong>
    <span class="badge badge-{{ $ticket->status }}">{{ $ticket->status }}</span>
    <p>{{ $ticket->description }}</p>
    <form method="POST" action="{{ route('tickets.status.update', $ticket) }}">
        @csrf @method('PATCH')
        <select name="status" style="width:auto;display:inline-block">
            @foreach(['open','in_progress','resolved','closed'] as $s)
                <option value="{{ $s }}" {{ $ticket->status === $s ? 'selected' : '' }}>{{ $s }}</option>
            @endforeach
        </select>
        <button type="submit" style="width:auto;display:inline-block;padding:8px 16px">Update</button>
    </form>
</div>
@empty
<p>No arrangement tickets.</p>
@endforelse
@endsection
