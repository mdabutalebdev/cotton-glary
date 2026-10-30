<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset password · Cotton Galary</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/banners/fav.png') }}">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; color: #1b2432; background: #f4f6f8; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px; }
        .card { width: 100%; max-width: 380px; background: #fff; border: 1px solid #e7ebf0; border-radius: 14px; padding: 34px 30px; }
        .sub { text-align: center; color: #74808f; font-size: 14px; margin-bottom: 8px; font-weight: 600; }
        .helper { text-align: center; color: #74808f; font-size: 13.5px; margin-bottom: 22px; line-height: 1.55; }
        .field { margin-bottom: 16px; }
        .field label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #3a4552; }
        .field input { width: 100%; padding: 11px 13px; font-size: 15px; color: #1b2432; background: #fff; border: 1.5px solid #dfe4ea; border-radius: 9px; }
        .field input:focus { outline: none; border-color: #1f6f5c; }
        .field input[readonly] { background: #f4f6f8; color: #74808f; }
        .btn { width: 100%; padding: 12px; font-size: 15px; font-weight: 600; color: #fff; background: #1f6f5c; border: none; border-radius: 9px; cursor: pointer; margin-top: 6px; }
        .btn:hover { background: #14503f; }
        .alert { background: #fdecea; border: 1px solid #f5c6c0; color: #c0392b; font-size: 13.5px; padding: 10px 13px; border-radius: 8px; margin-bottom: 18px; }
        .link { display: block; text-align: center; margin-top: 18px; font-size: 13.5px; color: #1f6f5c; text-decoration: none; }
        .link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="card">
        <a href="{{ url('/') }}" style="display:block; text-align:center; margin-bottom:14px;">
            <img src="{{ asset('uploads/banners/logo.png') }}" alt="Cotton Galary" style="height:72px; width:auto; display:inline-block;">
        </a>
        <p class="sub">Set a new password</p>
        <p class="helper">Choose a new password for your account.</p>

        @if ($errors->any())
            <div class="alert">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $email) }}" readonly required>
            </div>

            <div class="field">
                <label for="password">New password</label>
                <x-pw-field name="password" id="password" autocomplete="new-password" />
            </div>

            <div class="field">
                <label for="password_confirmation">Confirm new password</label>
                <x-pw-field name="password_confirmation" id="password_confirmation" autocomplete="new-password" />
            </div>

            <button type="submit" class="btn">Reset password</button>
        </form>

        <a href="{{ route('login') }}" class="link">&larr; Back to sign in</a>
    </div>
</body>
</html>
