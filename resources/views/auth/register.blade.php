<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background:#f0f2f5; display:flex; justify-content:center; align-items:center; min-height:100vh; }
        .card { border:none; border-radius:16px; box-shadow:0 4px 24px rgba(0,0,0,0.1); width:100%; max-width:420px; }
        .brand { background:#1b1b18; color:#fff; border-radius:16px 16px 0 0; padding:28px; text-align:center; }
    </style>
</head>
<body>
<div class="card">
    <div class="brand">
        <div style="font-size:32px">🎫</div>
        <div style="font-size:18px; font-weight:700; margin-top:6px">Create Account</div>
    </div>
    <div class="p-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                </div>
                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                </div>
                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Occupation</label>
                <select name="occupation" class="form-select">
                    <option value="technical" {{ old('occupation') == 'technical' ? 'selected' : '' }}>Technical</option>
                    <option value="control_centre" {{ old('occupation') == 'control_centre' ? 'selected' : '' }}>Control Centre</option>
                </select>
                @error('occupation') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-dark w-100 py-2">Register</button>
        </form>
        <p class="text-center mt-3 mb-0" style="font-size:13px">Already have an account? <a href="{{ route('login') }}" class="text-danger">Login</a></p>
    </div>
</div>
</body>
</html>
