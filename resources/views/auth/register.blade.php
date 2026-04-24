<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body { font-family: sans-serif; background: #f5f5f5; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .box { background: #fff; padding: 36px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { margin-bottom: 24px; color: #1b1b18; }
        label { font-size: 13px; font-weight: 600; color: #374151; display: block; margin-top: 14px; }
        input, select { width: 100%; padding: 9px; margin-top: 5px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; margin-top: 20px; background: #1b1b18; color: #fff; border: none; border-radius: 6px; font-size: 14px; cursor: pointer; }
        button:hover { background: #f53003; }
        .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
        .link { text-align: center; margin-top: 16px; font-size: 13px; }
        .link a { color: #f53003; text-decoration: none; }
    </style>
</head>
<body>
<div class="box">
    <h2>🎫 Create Account</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label>Occupation</label>
        <select name="occupation">
            <option value="technical" {{ old('occupation') == 'technical' ? 'selected' : '' }}>Technical</option>
            <option value="control_centre" {{ old('occupation') == 'control_centre' ? 'selected' : '' }}>Control Centre</option>
        </select>
        @error('occupation') <div class="error">{{ $message }}</div> @enderror

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Register</button>
    </form>
    <div class="link">Already have an account? <a href="{{ route('login') }}">Login</a></div>
</div>
</body>
</html>
