<?php
$title = $title ?? 'Login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header class="topbar">
        <strong>PHP Mini Bookstore Router</strong>
        <nav>
            <a href="/">Home</a>
            <a href="/books">Books</a>
            <a href="/books/create">Add Book</a>
            <a href="/health">Health</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/login">Login</a>
            <a href="/logout">Logout</a>
        </nav>
    </header>

    <main class="container viewport-height">
        <div class="dashboard-card" style="max-width: 440px; margin: 0 auto; padding: 36px 32px;">
            <div style="width: 52px; height: 52px; background-color: #eff6ff; color: #2563eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px auto;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3"/>
                </svg>
            </div>

            <h1 style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.6rem; font-weight: 800; color: #0f172a; margin: 0 0 6px 0; text-align: center; letter-spacing: -0.02em;">
                Login Demo
            </h1>
            <p style="color: #64748b; font-size: 0.88rem; margin: 0 0 24px 0; text-align: center; line-height: 1.4;">
                This page demonstrates controller organization and redirect response.
            </p>

            <form method="POST" action="/login" style="margin: 0;">
                <div class="form-group" style="margin-bottom: 16px;">
                    <label style="font-size: 0.8rem; margin-bottom: 6px; font-weight: 600;">Email</label>
                    <input type="email" name="email" placeholder="student@example.com" style="padding: 10px 14px; font-size: 0.92rem;">
                </div>

                <div class="form-group" style="margin-bottom: 24px;">
                    <label style="font-size: 0.8rem; margin-bottom: 6px; font-weight: 600;">Password</label>
                    <input type="password" name="password" placeholder="123456" style="padding: 10px 14px; font-size: 0.92rem;">
                </div>

                <button class="button" type="submit" style="width: 100%; margin: 0; padding: 12px; font-size: 0.95rem; font-weight: 600;">
                    Sign In
                </button>
            </form>
        </div>
    </main>
</body>
</html>
