@extends('tickets.layout')
@section('content')
<div class="card">
    <h2>New Ticket</h2>
    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <label>Title</label>
        <input type="text" name="title" required>
        <label>Description</label>
        <textarea name="description" rows="3" required></textarea>
        <label>Category</label>
        <select name="category">
            <option value="technical">Technical</option>
            <option value="arrangement">Arrangement</option>
            <option value="general">General</option>
        </select>
        <button type="submit">Submit Ticket</button>
    </form>
</div>
<h3>All Tickets</h3>
@foreach($tickets as $ticket)
<div class="card">
    <strong>{{ $ticket->title }}</strong>
    <span class="badge badge-{{ $ticket->category }}">{{ $ticket->category }}</span>
    <span class="badge badge-{{ $ticket->status }}">{{ $ticket->status }}</span>
    <p>{{ $ticket->description }}</p>
    <small>{{ $ticket->created_at->diffForHumans() }}</small>
</div>
@endforeach
@endsection
