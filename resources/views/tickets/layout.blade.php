<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing System</title>
    <style>
        body { font-family: sans-serif; margin: 0; background: #f5f5f5; }
        nav { background: #1b1b18; padding: 12px 24px; display: flex; gap: 20px; }
        nav a { color: #fff; text-decoration: none; font-size: 14px; }
        nav a:hover { color: #f53003; }
        .container { max-width: 900px; margin: 30px auto; padding: 0 20px; }
        .card { background: #fff; border-radius: 8px; padding: 20px; margin-bottom: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .badge { display: inline-block; padding: 2px 10px; border-radius: 12px; font-size: 12px; font-weight: 600; }
        .badge-open { background: #dbeafe; color: #1d4ed8; }
        .badge-in_progress { background: #fef9c3; color: #854d0e; }
        .badge-resolved { background: #dcfce7; color: #166534; }
        .badge-closed { background: #f3f4f6; color: #374151; }
        .badge-technical { background: #ede9fe; color: #5b21b6; }
        .badge-arrangement { background: #fce7f3; color: #9d174d; }
        .badge-general { background: #e0f2fe; color: #0369a1; }
        input, textarea, select, button { width: 100%; padding: 8px; margin-top: 6px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box; }
        button { background: #1b1b18; color: #fff; cursor: pointer; border: none; margin-top: 12px; }
        button:hover { background: #f53003; }
        .alert { background: #dcfce7; color: #166534; padding: 10px 16px; border-radius: 6px; margin-bottom: 16px; }
        label { font-size: 13px; font-weight: 600; color: #374151; }
    </style>
</head>
<body>
<nav>
    <a href="{{ route('home') }}">🏠 Home</a>
    <a href="{{ route('tickets.technical') }}">🔧 Technical</a>
    <a href="{{ route('tickets.arrangement') }}">📋 Arrangement</a>
    <a href="{{ route('tickets.status') }}">📊 Status</a>
    <a href="{{ route('tickets.followup') }}">🔔 Follow Up</a>
    <span style="margin-left:auto; color:#aaa; font-size:13px">
        {{ auth()->user()->name }} ({{ str_replace('_', ' ', auth()->user()->occupation) }})
    </span>
    <form method="POST" action="{{ route('logout') }}" style="margin:0">
        @csrf
        <button type="submit" style="background:transparent; color:#f53003; border:none; cursor:pointer; font-size:13px; padding:0; width:auto; margin:0">Logout</button>
    </form>
</nav>
<div class="container">
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>
