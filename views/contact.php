<?php
$title = $title ?? 'Contact Us';
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
        <div class="dashboard-card" style="max-width: 520px; margin: 0 auto; text-align: center; padding: 40px 32px;">
            <div style="width: 64px; height: 64px; background-color: #ecfdf5; color: #059669; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px auto; box-shadow: 0 4px 6px -1px rgba(5, 150, 105, 0.1);">
                <!-- Message Square SVG icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>

            <h1 style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.8rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.02em;">
                Contact Us
            </h1>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0 0 28px 0; line-height: 1.5; font-weight: 500;">
                Get in touch with our support and sales team directly.
            </p>

            <div style="text-align: left; border-top: 1px solid #f1f5f9; padding-top: 28px;">
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div style="color: #64748b; margin-right: 16px; display: flex; align-items: center; background: #f8fafc; padding: 10px; border-radius: 10px; border: 1px solid #e2e8f0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <div>
                        <div style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">Email Address</div>
                        <div style="font-size: 0.95rem; color: #334155; font-weight: 600;">support@example.com</div>
                    </div>
                </div>

                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div style="color: #64748b; margin-right: 16px; display: flex; align-items: center; background: #f8fafc; padding: 10px; border-radius: 10px; border: 1px solid #e2e8f0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <div>
                        <div style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">Phone Number</div>
                        <div style="font-size: 0.95rem; color: #334155; font-weight: 600;">+84 (123) 456-789</div>
                    </div>
                </div>

                <div style="display: flex; align-items: center;">
                    <div style="color: #64748b; margin-right: 16px; display: flex; align-items: center; background: #f8fafc; padding: 10px; border-radius: 10px; border: 1px solid #e2e8f0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <div>
                        <div style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">Working Hours</div>
                        <div style="font-size: 0.95rem; color: #334155; font-weight: 600;">Mon - Fri, 8:00 AM - 5:00 PM</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
