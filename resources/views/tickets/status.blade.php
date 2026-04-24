@extends('tickets.layout')
@section('content')
<h2>📊 Tickets by Status</h2>
@foreach(['open','in_progress','resolved','closed'] as $s)
    <h3 style="text-transform:capitalize">{{ str_replace('_',' ',$s) }}</h3>
    @foreach($tickets->where('status', $s) as $ticket)
    <div class="card">
        <strong>{{ $ticket->title }}</strong>
        <span class="badge badge-{{ $ticket->category }}">{{ $ticket->category }}</span>
        <p>{{ $ticket->description }}</p>
    </div>
    @endforeach
@endforeach
@endsection
    