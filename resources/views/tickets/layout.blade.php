<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background:#f0f2f5; }
        .navbar { background:#1b1b18 !important; }
        .navbar-brand { color:#fff !important; font-weight:700; }
        .drawer { position:fixed; top:0; left:-280px; width:280px; height:100vh; background:#1b1b18; z-index:1050; transition:left 0.3s; display:flex; flex-direction:column; }
        .drawer.open { left:0; }
        .drawer-overlay { position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:1040; display:none; }
        .drawer-overlay.show { display:block; }
        .drawer .brand { color:#fff; font-size:18px; font-weight:700; }
        .drawer a { color:#aaa; text-decoration:none; padding:12px 20px; display:block; font-size:14px; transition:all .2s; }
        .drawer a:hover, .drawer a.active { background:#f53003; color:#fff; }
        .drawer .user-box { margin-top:auto; padding:16px 20px; border-top:1px solid #333; }
        .drawer .user-box .name { color:#fff; font-size:14px; font-weight:600; }
        .drawer .user-box .occ { color:#aaa; font-size:12px; text-transform:capitalize; }
        .drawer .logout-btn { background:none; border:none; color:#f53003; font-size:13px; padding:0; cursor:pointer; margin-top:8px; }
        .main { padding:30px; margin-top:56px; }
        .page-title { font-size:20px; font-weight:700; margin-bottom:20px; color:#1b1b18; }
        .card { border:none; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.07); }
    </style>
</head>
<body>
<nav class="navbar navbar-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" onclick="toggleDrawer()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand">🎫 Tickstem</span>
        <span class="navbar-text" style="color:#f53003; font-weight:600;">{{ auth()->user()->name }}</span>
    </div>
</nav>

<div class="drawer-overlay" onclick="closeDrawer()"></div>
<div class="drawer" id="drawer">
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom border-secondary">
        <div class="brand mb-0">🎫 Tickstem</div>
        <button class="btn btn-sm text-white" onclick="closeDrawer()">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}"><i class="bi bi-house-door me-2"></i>Home</a>
    <a href="{{ route('tickets.technical') }}" class="{{ request()->is('technical') ? 'active' : '' }}"><i class="bi bi-tools me-2"></i>Technical</a>
    <a href="{{ route('tickets.arrangement') }}" class="{{ request()->is('arrangement') ? 'active' : '' }}"><i class="bi bi-clipboard-check me-2"></i>Arrangement</a>
    <a href="{{ route('tickets.status') }}" class="{{ request()->is('status') ? 'active' : '' }}"><i class="bi bi-bar-chart-line me-2"></i>Status</a>
    <a href="{{ route('tickets.followup') }}" class="{{ request()->is('followup') ? 'active' : '' }}"><i class="bi bi-bell me-2"></i>Follow Up</a>
    <div class="user-box">
        <div class="name"><i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}</div>
        <div class="occ">{{ str_replace('_',' ', auth()->user()->occupation) }}</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn"><i class="bi bi-box-arrow-left me-1"></i>Logout</button>
        </form>
    </div>
</div>

<div class="main">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @yield('content')
</div>

<script>
function toggleDrawer() {
    const drawer = document.getElementById('drawer');
    const overlay = document.querySelector('.drawer-overlay');
    drawer.classList.toggle('open');
    overlay.classList.toggle('show');
}

function closeDrawer() {
    const drawer = document.getElementById('drawer');
    const overlay = document.querySelector('.drawer-overlay');
    drawer.classList.remove('open');
    overlay.classList.remove('show');
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
