<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in · Cotton Galary</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/banners/fav.png') }}">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #1b2432;
            background: #f4f6f8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .card {
            width: 100%;
            max-width: 380px;
            background: #fff;
            border: 1px solid #e7ebf0;
            border-radius: 14px;
            padding: 34px 30px;
        }
        .brand {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .brand span { color: #1f6f5c; }
        .sub {
            text-align: center;
            color: #74808f;
            font-size: 14px;
            margin-bottom: 26px;
        }
        .field { margin-bottom: 16px; }
        .field label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
            color: #3a4552;
        }
        .field input {
            width: 100%;
            padding: 11px 13px;
            font-size: 15px;
            color: #1b2432;
            background: #fff;
            border: 1.5px solid #dfe4ea;
            border-radius: 9px;
        }
        .field input:focus {
            outline: none;
            border-color: #1f6f5c;
        }
        .btn {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            background: #1f6f5c;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            margin-top: 6px;
        }
        .btn:hover { background: #14503f; }
        .alert {
            background: #fdecea;
            border: 1px solid #f5c6c0;
            color: #c0392b;
            font-size: 13.5px;
            padding: 10px 13px;
            border-radius: 8px;
            margin-bottom: 18px;
        }
        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13.5px;
            color: #4a5563;
            margin-bottom: 18px;
            cursor: pointer;
        }
        .remember input { width: 15px; height: 15px; accent-color: #1f6f5c; }
    </style>
</head>
<body>
    <div class="card">
        <a href="{{ url('/') }}" style="display:block; text-align:center; margin-bottom:14px;">
            <img src="{{ asset('uploads/banners/logo.png') }}" alt="Cotton Galary" style="height:72px; width:auto; display:inline-block;">
        </a>
        <p class="sub">Sign in to your account</p>

        @if ($errors->any())
            <div class="alert">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}"
                       autocomplete="username" autofocus required>
            </div>

            <div class="field">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:6px;">
                    <label for="password" style="margin-bottom:0;">Password</label>
                    <a href="{{ route('password.request') }}" style="font-size:12.5px; color:#1f6f5c; text-decoration:none;">Forgot password?</a>
                </div>
                <x-pw-field name="password" id="password" autocomplete="current-password" />
            </div>

            <label class="remember">
                <input type="checkbox" name="remember" value="1"> Remember me
            </label>

            <button type="submit" class="btn">Sign in</button>
        </form>
    </div>
</body>
</html>
