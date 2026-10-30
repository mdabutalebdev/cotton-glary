<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Account · Cotton Galary</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/banners/fav.png') }}">
    <style>
        :root {
            --brand:      #1f6f5c;
            --brand-dark: #14503f;
            --ink:        #1b2432;
            --muted:      #74808f;
            --line:       #e7ebf0;
            --bg:         #f4f6f8;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: var(--ink); background: var(--bg); min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            padding: 16px 30px; background: #fff; border-bottom: 1px solid var(--line);
        }
        .logo { display: flex; align-items: center; gap: 11px; font-size: 18px; font-weight: 700; }
        .logo .mark {
            width: 36px; height: 36px; border-radius: 10px;
            background: linear-gradient(135deg, var(--brand), var(--brand-dark));
            color: #fff; display: grid; place-items: center; font-size: 18px;
        }
        .who { display: flex; align-items: center; gap: 14px; }
        .who .avatar {
            width: 38px; height: 38px; border-radius: 50%;
            background: linear-gradient(135deg, var(--brand), var(--brand-dark));
            color: #fff; display: grid; place-items: center; font-weight: 700; font-size: 15px;
        }
        .who .meta { line-height: 1.3; }
        .who .meta .name { font-size: 14px; font-weight: 600; }
        .who .meta .role { font-size: 12px; color: var(--muted); }
        .logout-btn {
            border: 1px solid var(--line); background: #fff; color: #3a4552;
            font-size: 13.5px; font-weight: 600; padding: 9px 16px;
            border-radius: 9px; cursor: pointer;
        }
        .logout-btn:hover { background: #f7f9fa; }

        .wrap { max-width: 820px; margin: 40px auto; padding: 0 24px; }
        .hero {
            background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
            color: #eafaf3; border-radius: 18px; padding: 34px 30px; margin-bottom: 24px;
        }
        .hero h1 { font-size: 24px; margin-bottom: 8px; }
        .hero p { font-size: 14.5px; color: rgba(234,250,243,.85); max-width: 46ch; line-height: 1.6; }

        .cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
        .c {
            background: #fff; border: 1px solid var(--line); border-radius: 14px;
            padding: 22px; text-align: center;
        }
        .c .ic { font-size: 26px; margin-bottom: 10px; }
        .c .val { font-size: 22px; font-weight: 700; }
        .c .lbl { font-size: 13px; color: var(--muted); margin-top: 2px; }

        @media (max-width: 640px) { .cards { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <header class="topbar">
        <a href="{{ url('/') }}" class="logo" style="text-decoration:none; color:inherit;">
            <img src="{{ asset('uploads/banners/logo.png') }}" alt="Cotton Galary" style="height:46px; width:auto;">
        </a>
        <div class="who">
            <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <div class="meta">
                <div class="name">{{ auth()->user()->name }}</div>
                <div class="role">Customer</div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Log out</button>
            </form>
        </div>
    </header>

    <div class="wrap">
        <div class="hero">
            <h1>Hello, {{ auth()->user()->name }} 👋</h1>
            <p>Welcome to your Cotton Galary account. Browse the latest collection, track your orders and manage your profile here.</p>
        </div>

        <div class="cards">
            <div class="c"><div class="ic">🧾</div><div class="val">3</div><div class="lbl">My orders</div></div>
            <div class="c"><div class="ic">❤️</div><div class="val">12</div><div class="lbl">Wishlist</div></div>
            <div class="c"><div class="ic">🎁</div><div class="val">150</div><div class="lbl">Reward points</div></div>
        </div>
    </div>
</body>
</html>
