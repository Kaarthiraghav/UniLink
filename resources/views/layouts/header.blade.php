<header id="top-bar" style="background: #2980b9; color: #fff; padding: 16px 32px; display: flex; align-items: center; box-shadow: 0 2px 8px rgba(0,0,0,0.07);">
    <img src="/logo.png" alt="UniLink Logo" style="height:48px;width:48px;border-radius:12px;margin-right:18px;box-shadow:0 2px 8px rgba(0,0,0,0.08);background:#fff;object-fit:cover;">
    <h2 style="margin:0;font-size:1.7rem;font-weight:600;letter-spacing:1px;">Welcome, {{ Auth::user()->name }}</h2>
</header>